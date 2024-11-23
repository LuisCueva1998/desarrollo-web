<?php
require_once 'config.php';
require_once 'funciones.php';
//Nos permite cerrar sesión.
cerrarSesion();
header("Location: index.php");
exit();
?>