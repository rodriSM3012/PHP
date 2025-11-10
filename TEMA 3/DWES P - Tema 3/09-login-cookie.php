<?php
$userCookieValue = "";
$lastConnectionCookieValue = "";
$cookieExpire = time() + 60 * 60 * 24 * 365;
$message = "";
$userName = "";

if (isset($_COOKIE["usuario"]) && $_COOKIE["usuario"] !== '') {
    $userCookieValue = $_COOKIE["usuario"];
    $userName = $userCookieValue;
}
if (isset($_COOKIE["ultimaConexion"]) && $_COOKIE["ultimaConexion"] !== '') {
    $lastConnectionCookieMsg = 'Última conexión: ' . $_COOKIE["ultimaConexion"];
    $lastConnectionCookieValue = $_COOKIE["ultimaConexion"];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $userTest = 'usuario';
    $passwordTest = 'clave';

    if ($userName === $userTest && $password === $passwordTest) {
        $now = date('Y-m-d H:i:s');
        setcookie("usuario", $userName, $cookieExpire);
        setcookie("ultimaConexion", $now, $cookieExpire);

        $message = 'Login correcto.';
        if ($lastConnectionCookieValue) {
            $message .= 'Tu última conexión fue: ' . htmlspecialchars($lastConnectionCookieMsg) . '.';
        } else {
            $message .= ' Esta es tu primera conexión registrada.';
        }
        $lastConnectionMsg = 'Última conexión: ' . $now;
    } else {
        $message = 'Credenciales incorrectas. Intenta de nuevo.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login con Cookie</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; padding: 1rem; }
        form { max-width: 380px; margin-top: 1rem; }
        label { display:block; margin: .5rem 0 0.25rem; }
        input[type="text"], input[type="password"] { width:100%; padding:.4rem; }
        .msg { margin-top: .8rem; padding: .6rem; background:#f0f0f0; border-radius:4px; }
    </style>
</head>
<body>
    <h1>Login</h1>

    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <?php if (isset($lastConnectionCookieMsg)): ?>
        <p><?php echo $lastConnectionCookieMsg; ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label for="username">Usuario</label>
        <input id="username" name="username" type="text" value="<?php echo $userName; ?>" required>

        <label for="password">Contraseña</label>
        <input id="password" name="password" type="password" required>

        <button type="submit">Entrar</button>
    </form>
</body>
</html>
