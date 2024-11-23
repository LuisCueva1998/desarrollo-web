<?php
require_once 'config.php';
//Registrar Usuario Nuevo y agragarlo a nustra base de datos
function registrarUsuario($username, $password, $email) {
    global $pdo;
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO usuarios (username, password, email) VALUES (?, ?, ?)";
    try {
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$username, $password_hash, $email]);
    } catch(PDOException $e) {
        return false;
    }
}
//verificar que el Exita en nuestra Base de Datos
function verificarLogin($username, $password) {
    global $pdo;
    
    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    }
    return false;
}
// Ingresa a la pagina unas vez verificada que esxite
function estaAutenticado() {
    return isset($_SESSION['user_id']);
}
// Cerrar Sesion de Usuario
function cerrarSesion() {
    session_unset();
    session_destroy();
}
?>