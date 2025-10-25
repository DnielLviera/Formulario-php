<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="contenedor">
        <div class="form-contenedor">
            <h2>Iniciar Sesión</h2>

            <?php
            if (isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'campos_vacios':
                        echo '<div class="error">Error: Todos los campos son obligatorios.</div>';
                        break;
                    case 'credenciales_incorrectas':
                        echo '<div class="error">Error: Correo o contraseña incorrectos.</div>';
                        break;
                }
            }
            if (isset($_GET['status']) && $_GET['status'] == 'logout') {
                echo '<div class="success">Has cerrado sesión correctamente.</div>';
            }
            ?>
            
            <form action="procesar_login.php" method="POST">
              
              <div class="form-grupo">
                <label>Correo: </label>
                <input type="email" id="correo" name="correo" required>
              </div>
              
              <div class="form-grupo">
                <label>Contraseña: </label>
                <input type="password" id="contrasena" name="contrasena" required>
              </div>
              
              <button type="submit">Iniciar Sesión</button>
            </form>

            <p>¿No tienes cuenta? <a href="index.php">Regístrate</a></p>
        </div>
    </div>
</body>
</html>