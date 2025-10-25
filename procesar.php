<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = trim($_POST['nombre'] ?? '');
        $correo = trim($_POST['correo'] ?? '');
        $contrasena = trim($_POST['contrasena'] ?? '');
        $confirmar_contrasena = trim($_POST['confirmar_contrasena'] ?? '');

        if (empty($nombre) || empty($correo) || empty($contrasena) || empty($confirmar_contrasena)) {
            header("Location: index.php?error=campos_vacios");
            exit();
        }

        if ($contrasena !== $confirmar_contrasena) {
            header("Location: index.php?error=contrasenas_no_coinciden");
            exit();
        }

        if (!preg_match('/^[^@]+@[^@]+\.com$/', $correo)) {
            header("Location: index.php?error=correo_invalido");
            exit();
        }

        if (strlen($contrasena) < 8) {
            header("Location: index.php?error=contrasena_corta");
            exit();
        }

        if (!preg_match('/[A-Z]/', $contrasena)) {
            header("Location: index.php?error=contrasena_sin_mayuscula");
            exit();
        }
        

        if (!preg_match('/[a-z]/', $contrasena)) {
            header("Location: index.php?error=contrasena_sin_minuscula");
            exit();
        }

        if (!preg_match('/[0-9]/', $contrasena)) {
            header("Location: index.php?error=contrasena_sin_numero");
            exit();
        }

        if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $contrasena)) {
            header("Location: index.php?error=contrasena_sin_especial");
            exit();
        }

        $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

        $nuevo_usuario = [
            'nombre' => $nombre,
            'correo' => $correo,
            'contrasena_hash'=> $contrasena_hash
        ];

        $archivo_json = 'usuarios.json';

        $usuarios_existentes = [];
        if (file_exists($archivo_json)) {
            $contenido_json = file_get_contents($archivo_json);
            if (!empty($contenido_json)) {
                $usuarios_existentes = json_decode($contenido_json, true);
                if ($usuarios_existentes === null) {
                    $usuarios_existentes = [];
                }
            }
        }

        $usuarios_existentes[] = $nuevo_usuario;

        $json_actualizado = json_encode($usuarios_existentes, JSON_PRETTY_PRINT);

        if (file_put_contents($archivo_json, $json_actualizado) !== false) {
            header("Location: index.php?status=exito");
            exit();
        } else {
            echo "Error: No se pudo guardar la información.";
        }
    } else {
        header("Location: index.php");
        exit();
    }
?>