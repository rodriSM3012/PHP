## DB
`php artisan make:model ` control + migraciones
hacer migraciones cuando hay modelo
no se hacen seeders
la api no se puede probar sin als migraciones y es mejor hacerlas justo despues del modelo

peliculas
    + titulo
    + director
    + descripcion

socios
    + nombre
    + apellidos
    + email (unico)

prestamo
    + fecha_prestamo
    + fecha_devolucion

---

## tests → instalar pest
+ modelo → pelicula
+ controlador → socio
+ pelicula → si devuelve info → titulo director 
    hay que hacer una vista para este test
