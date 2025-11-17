<nav>
    <ul>
        <li><a href="./index.php">Inicio</a></li>
        <?php if (isset($_SESSION["rol"])) { ?>
            <li><a href="./logout.php">Cerrar sesión</a></li>
        <?php } else { ?>
            <li><a href="./login.php">Iniciar sesión</a></li>
        <?php }
        if (isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") { ?>
            <li><a href="./admin-pizzas.php">Administrador</a></li>
        <?php } ?>
    </ul>
</nav>