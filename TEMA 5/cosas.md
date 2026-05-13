# Comandos
+ lanzar servidor → `php artisan serve`
+ crear modelo → `php artisan make:model [nombre] -mr` → al usar `mr` crea las migraciones + el controlador
+ crear controlador → `php artisan make:controller [nombre]Controller`
+ crear test → `php artisan make:test [nombre]Test --pest`
+ crear factory → `php artisan make:factory [nombre]Factory`
# crear tests
```php
test('Posts index page can be accessed', function () {
	// $response = $this->get('/');
	$response = $this->get(route('posts.index'));
	
	$response->assertStatus(200);
	$response->assertSee('Todos los posts');    
});
```
- `php artisan test --filter 'Posts index page can be accessed'`
- `php artisan test tests/Feature/PostAccesTest.php`
```php
test('Posts index page with h1 can be accessed', function () {
	$response = $this->get(route('posts.index'));
	
	$response->assertStatus(200);
	$response->assertSeeInOrder(['<h1>', 'Todos los posts', '</h1>'], false);
});

test('Verify that the Post class exists and is accessible', function () {
	$claseExiste = class_exists('App\Models\Post');
	expect($claseExiste)->toBeTrue();
});

it('Verify that the Post controller exists and is accessible', function () {
	$classExists = class_exists('App\Http\Controllers\PostController');
	expect($classExists)->toBeTrue();
});
```
2. creación del modelo con migraciones `-mr`
3. editar la migracion 
```php
Schema::create('posts', function (Blueprint $table) {
	$table->id();
	$table->foreignId('user_id')->constrained()->onDelete('cascade');
	$table->string('title');
	$table->text('content');
	$table->string('image_path')->nullable();
	$table->timestamps();
});
```
4. hacer migracion con `php artisan migrate`
5. hacer factoria `php artisan make:factory [nombre]Factory`
```php
public function definition(): array {
	return [
		'user_id' =>User::factory(),
		'title' => fake()->sentence(),
		'content' => fake()->paragraph(),
		'image_path' => null,
	];
}
```
6. añadir test
```php
test('Verify index list all posts in order by date descending', function () {
	$user= User::factory()->create();
	$post1 = Post::factory()->create();
	$post2 = Post::factory()->create();
	
	// $post1 = Post::factory()->create([
	//     'created_at' => now()->subDay()
	// ]);
	// $post2 = Post::factory()->create([
	//     'created_at' => now()
	// ]);
	
	$response = $this->get(route('posts.index'));
	$response->assertStatus(200)
		->assertSee($post1->title)
		->assertSee($post2->title)
		->assertSeeInOrder([$post2->title, $post1->title]);
});
```
7. modificar ruta y controlador
```php
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

public function index() {
	$posts = Post::with('user')->latest()->get();
	return view('posts.index', compact('posts'));
}
```
# crear api
1. crear BBDD
2. configurar .env
3. crear modelo con migraciones + controladores usando `-mr`
4. completar migraciones `php artisan migrate`
5. añadir metodos `index(all)` y `store(create)` al controlador 
6. crear rutas en app.php
	+ `api: __DIR__.'/../routes/api.php',`
7. si da error 404 → `php artisan route:list`