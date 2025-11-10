<?php
session_start();
session_destroy();
header("Location: 08-sesiones-principal.php");
