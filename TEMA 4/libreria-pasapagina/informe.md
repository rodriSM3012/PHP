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
    