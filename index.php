<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulario</title>
</head>
<body>
    <h2>Formulario</h2>

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
            case 'contrasena_sin_especial':
                echo '<div class="error">Error: La contraseña debe contener al menos un carácter especial (!@#$%^&*()-_=+{};:,<.>).</div>';
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
        <input type="email" id="correo" name="correo" required>
        <small>Formato: usuario@dominio.com</small>
      </div>
      
      <div class="form-grupo">
        <label>Contraseña: </label>
        <input type="password" id="contrasena" name="contrasena" required>
        <small>Mínimo 8 caracteres, una mayúscula, una minúscula y un carácter especial</small>
      </div>
      
      <button type="submit">Registrarse</button>
    </form>
</body>
</html>