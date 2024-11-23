<?php
require_once 'config.php';
require_once 'funciones.php';
//Página de inicio donde nos muestra que el usuario ingresó correctamente y le da la bienvenida y también puede cerrar sesión.
if (!estaAutenticado()) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="main-container">
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php" style="float: right;">Cerrar Sesión</a>
        </div>
    </nav>

    <div class="main-container">
        <div class="auth-container">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <p>Has iniciado sesión correctamente.</p>
        </div>
    </div>
</body>
</html>