<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Formulario</title>
</head>
<body>
    <div class="contenedor">
        <div class="form-contenedor">
            <h2>Registro de Usuario</h2>

            <?php
            if (isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'campos_vacios':
                        echo '<div class="error">Error: Todos los campos son obligatorios.</div>';
                        break;
                    case 'correo_invalido':
                        echo '<div class="error">Error: El correo electrónico no es válido.</div>';
                        break;
                    case 'contrasena_corta':
                        echo '<div class="error">Error: La contraseña debe tener al menos 8 caracteres.</div>';
                        break;
                    case 'contrasena_sin_mayuscula':
                        echo '<div class="error">Error: La contraseña debe contener al menos una letra mayúscula.</div>';
                        break;
                    case 'contrasena_sin_minuscula':
                        echo '<div class="error">Error: La contraseña debe contener al menos una letra minúscula.</div>';
                        break;
                    case 'contrasena_sin_numero':
                        echo '<div class="error" id="message">Error: La contraseña debe contener al menos un número.</div>';
                        break;
                    case 'contrasena_sin_especial':
                        echo '<div class="error">Error: La contraseña debe contener al menos un carácter especial (!@#$%^&*()-_=+{};:,<.>).</div>';
                        break;
                    case 'contrasena_no_coinciden':
                        echo '<div class="error">Error: Las contraseñas no coinciden.</div>';
                        break;
                }
            }
            if (isset($_GET['status']) && $_GET['status'] == 'exito') {
                echo '<div class="success">Registro exitoso.</div>';
            }
            
            ?>
            
            <form action="procesar.php" method="POST">
            
            <div class="form-grupo">
                <label>Nombre: </label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-grupo">
                <label>Correo: </label>
                <input type="email" id="correo" name="correo" placeholder="usuario@dominio.com" required>
            </div>
            
            <div class="form-grupo">
                <label>Contraseña: </label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Mínimo 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial" required>
            </div>
            
            <div class="form-grupo">
                <label>Confirmar contraseña: </label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
            </div>

            <button type="submit">Registrarse</button>
            </form>

            <p>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a></p>
        </div>
    </div>
</body>
</html>