# comandos de laravel
### crear proyecto nuevo
`composer create-project laravel/laravel [nombre-proyecto]` 
### lanzar servidor
`php artisan serve`
### crear vista
`php artisan make:controller PaginasController`
todos los controladores tienen que terminar por Controller

1. crear base de datos vacia en phpmyadmin
2. hacer migracion
### crear migracion
`php artisan make:migration create_cursos_table`
### comenzar migracion
`php artisan migrate`
### crear modelo
`php artisan make:model Curso`
3. seeders
### crear seeder
`php artisan make:seeder PizzaSeeder`
### ejecutar seeder
`php artisan migrate:fresh --seed`
PARA ERROR → `composer install` en carpeta del proyecto

### mostrar todas las rutas
`php artisan route:list`

### crear modelo con migraciones
`php artisan make:model Vehicle -m`

### instalar api
`php artisan install api`

## instalar pest
`composer require laravel/breeze --dev`
`php artisan breeze:install`
`composer remove phpunit/phpunit`
`composer require pestphp/pest --dev --with-all-dependencies`
`./vendor/bin/pest -init`
`./vendor/bin/pest/php artisan test`

### crear test 
`php artisan make:test PostAccessTest --pest`

### crear factory
`php artisan make:factory NombreFactory`