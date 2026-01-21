# Libreria Pasapagina
## Informe de Base de Datos
### 1. Definición del objetivo
El objetivo de este informe es centralizar y analizar la información de la librería para optimizar la toma de decisiones. En conreto sebusca crear una guía para el diseño y la producción de la base de datos. La base de datos servirá para controlar el registro de cada libro distinto en las existencias de la librería.
### 2. Estructura
#### Tabla LIBROS

| id      | AI (PK)      |
| ------- | ------------ |
| titulo  | VARCHAR(30)  |
| autor   | VARCHAR(80)  |
| paginas | INT          |
| precio  | DECIMAL(2,5) |
### 3. Herramientas
- Excel
- MySQL
- phpMyAdmin


- DatabaseSeeder → especififcar las rutas

- LibroController.php
    - listado de libros → get::all
    - mostrar un libro → ID → get FindorFail (solo sirve para la id)
    - crear libro → no hace falta pasar ID
        - recoger datos → GET 
        - crear libro → POST (request) → validar titulo require
    - update    
        - recoger datos (ID) → GET
        - actualziar libro (objeto completo) → PUT (request)
    - 
    
----------------------

# CRUD
## C 
    - get → *nada*
    - post → request
## R 
    - get → *nada*
    - get → ID / objeto
## U
    - get → objeto (NO ID)
    - put / patch → request
## D 
    - get → [codigo js]
    - delete → objeto (NO ID)

# Pasos Proyecto Laravel
1. modificar .env
2. `php artisan make:controller LibroController --resource --model=Libro`
    - metodo index create show edit update confrimDestroy destroy

- borrar todo menos Route:: de web.php
- ```
  use App\Http\Controllers\LibroController;
  Route::resource('libro', LibroController::class);
  ```

- `php artisan route:list` → devuelvve lista de todas las rutas creadas
