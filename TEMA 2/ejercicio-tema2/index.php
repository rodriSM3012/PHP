<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "./clases/Miembros.php";
    require "./clases/Alumnos.php";
    require "./clases/Profesores.php";
    require "./clases/Asignatura.php";

    $alumnos = Alumno::crearAlumnosDeMuestra();
    $profesores = Profesor::crearProfesoresDeMuestra();
    $asignaturas = Asignatura::crearAsignaturasDePrueba();

    // -> es igual que el . en java para llamar a una funcion de un objeto 
    $alumnos[0]->matricularEnAsignatura($asignaturas[0]);
    $alumnos[1]->matricularEnAsignatura($asignaturas[0]);
    $alumnos[1]->matricularEnAsignatura($asignaturas[1]);
    $alumnos[2]->matricularEnAsignatura($asignaturas[0]);
    $alumnos[2]->matricularEnAsignatura($asignaturas[2]);
    $alumnos[3]->matricularEnAsignatura($asignaturas[0]);
    $alumnos[4]->matricularEnAsignatura($asignaturas[0]);
    $alumnos[4]->matricularEnAsignatura($asignaturas[1]);
    $alumnos[4]->matricularEnAsignatura($asignaturas[2]);
    $alumnos[5]->matricularEnAsignatura($asignaturas[0]);
    $alumnos[6]->matricularEnAsignatura($asignaturas[1]);
    $alumnos[6]->matricularEnAsignatura($asignaturas[1]);
    $alumnos[7]->matricularEnAsignatura($asignaturas[2]);
    $alumnos[8]->matricularEnAsignatura($asignaturas[1]);
    $alumnos[9]->matricularEnAsignatura($asignaturas[0]);

    $alumnosMenores23 = array_filter($alumnos, function ($alumno) {
        return $alumno->getEdad() < 23;
    });
    print_r($alumnosMenores23);
    ?>
</body>

</html>