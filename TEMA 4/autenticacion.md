# autenticacion
+ ruta
+ bloqueo enlaces
    + guest
    + refistrado 
        + user
        + admin

middleware

# AUTENTICACIÓN
`laravel new proyecto`
`cd proyecto`
`composer require laravel/breeze --dev`
`php artisan breeze:install` → blade → yes/no → 1
`npm install`
si da error →
    `Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope LocalMachine`
    `Set-ExecutionPolicy -ExecutionPolicy Bypass -Scope Process`
    `Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser`

`npm run build`
`php artisan migrate`



Revisar la migración de usuarios (database/migrations/...create_users_table.php) y añadid:
`$table->foreignId('role_id')->constrained()->onDelete('cascade');`


```php
php artisan make:model Role -m
Schema::create('roles', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique(); // ADMIN, USER, etc
    $table->timestamps();
});
```


Añadimos a modelo User:
```php
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole($role)
    {
        return $this->role->name === $role;
    }
```

Añadimos a modelo Role:
```php
public function users()
    {
        return $this->hasMany(User::class);
    }
```

Creamos seeders:
```php
php artisan make:seeder RoleSeeder
Role::create(['name' => 'ADMIN']);
Role::create(['name' => 'USER']);
php artisan make:seeder UserSeeder
        $adminRole = Role::where('name', 'ADMIN')->first();
        $userRole  = Role::where('name', 'USER')->first();

        // Usuario ADMIN
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role_id' => $adminRole->id,
        ]);

        // Usuario USER
        User::create([
            'name' => 'Usuario Normal',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role_id' => $userRole->id,
        ]);
```

Buscamos:
```php
app/Http/Controllers/Auth/RegisteredUserController.php
```
Pegamos en store:
```php
$userRole = Role::where('name', 'USER')->first();

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $userRole->id,
    ]);
```
Creamos proteccion para rutas:
```php
php artisan make:middleware RoleMiddleware
```
Reemplazamos:
```php
    public function handle($request, Closure $next, $role)
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user || !$user->hasRole($role)) {
            abort(403);
        }

        return $next($request);
    }
```
Añadimos:
```php
use Illuminate\Support\Facades\Auth;
use App\Models\User;



bootstrap/app.php
Añade:
use App\Http\Middleware\RoleMiddleware;
Reemplaza:
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'role' => RoleMiddleware::class,
    ]);
})
```
