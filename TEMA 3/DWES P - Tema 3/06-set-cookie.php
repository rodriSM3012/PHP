<?php
/*
setcookie(
    string $name,
    string $value,
    int $expires,
    string $path,
    string $domain,
    bool $secure = false,
    bool $httponly = false
    ): bool;
*/

$name = "Patata";
$value = "Contenido de la cookie";
$expires = time() + 60 * 60 * 24; # un día -> segundos, minutos, horas
$path = "/";
$domain = "dominio.com";
$secure = false;
$httponly = false;

setcookie(
    $name,
    $value,
    $expires
);

setcookie(
    "Varios",
    "Carpeta varios",
    $expires,
    "/varios"
);

// para borrar una cookie, crear una nueva, con el mismo nombre que la que queremos borrar
// y poner una fecha de expiración anterior a la actual
// time() - 60 * 60 * 24

// $expires = time() - 60 * 60 * 24;

// setcookie(
//     $name,
//     $value,
//     $expires
// );

if (isset($_COOKIE)) {
    foreach ($_COOKIE as $key => $value) {
        echo $key . " " . $value . "<br>";
    }
}

/*
if (isset($_COOKIE)) {
    foreach ($_COOKIE as $key => $value) {
        setcookie($key, '', time() - 3600);
    }
}
*/

if (!isset($_COOKIE['visitas'])) {
    $visitas = 1;
} else {
    $visitas = (int) $_COOKIE['visitas'];
    $visitas++;
}
setcookie('visitas', $visitas, time() + 3600 * 24);

if ($visitas == 1) {
    echo "<p>Bienvenido por primera vez</p>";
} else {
    // Imprimir el número de visitas en la pantalla
    echo "<p>Número de visitas: " . $visitas . "</p>";
}
