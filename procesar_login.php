<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST['correo'] ?? '');
    $contrasena = trim($_POST['contrasena'] ?? '');

    if (empty($correo) || empty($contrasena)) {
        header("Location: login.php?error=campos_vacios");
        exit();
    }

    $archivo_json = 'usuarios.json';

    if (!file_exists($archivo_json)) {
        header("Location: login.php?error=credenciales_incorrectas");
        exit();
    }

    $contenido_json = file_get_contents($archivo_json);
    $usuarios = json_decode($contenido_json, true);

    if ($usuarios === null) {
        header("Location: login.php?error=credenciales_incorrectas");
        exit();
    }

    $usuario_encontrado = null;
    foreach ($usuarios as $usuario) {
        if ($usuario['correo'] === $correo) {
            $usuario_encontrado = $usuario;
            break;
        }
    }

    if ($usuario_encontrado && password_verify($contrasena, $usuario_encontrado['contrasena_hash'])) {
        $_SESSION['usuario'] = [
            'nombre' => $usuario_encontrado['nombre'],
            'correo' => $usuario_encontrado['correo']
        ];
        
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=credenciales_incorrectas");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>