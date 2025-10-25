<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style_dashboard.css">
    <title>Pagina de destino</title>
</head>
<body>
    <div class="header">
        <h1>Bienvenido a la pagina de destino</h1>
        <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
    </div>
    
    <div class="bienvenida">
        <h2>¡Hola, <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>!</h2>
        <p>Has iniciado sesión correctamente.</p>
    </div>
</body>
</html>