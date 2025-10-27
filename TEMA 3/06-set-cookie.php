<?php
/*
setcookie(
    string $name,
    string $value,
    int $expires,
    string $Path,
    string $domain,
    bool $secure = false,
    bool $httponly = false,
): bool;
*/

$name = "Patata";
$value = "Contenido de la cookie";
$expires = time() + 60 * 60 * 24; // + [...] → añade tiempo al tiempo actual, marcando la fecha de expiracion
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

// para borrar una cookie, crear una nueva, con el mismo nombre que la anterior 
// y poner uan fecha de expiracion anterior a la actual

// las variables $_ se crean atuomaticamente en el servidor 
if (isset($_COOKIE)) {
    foreach ($_COOKIE as $key => $value) {
        echo $key . " " . $value . "<br/>";
    }
}

/*
if (isset($_COOKIE)) {
    foreach ($_COOKIE as $key => $value) {
        echo $key . " " . $value . "<br/>";
    }
};
*/

if (!isset($_COOKIE["visitas"])) {
    $visitas = 1;
} else {
    
}
