<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión La libreria</title>
    <link rel="stylesheet" href="estilos/principal.css">
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <h2>La libreria</h2>
            <h2>Administrador</h2>
            <div class="input-group">
                <input type="text" name="username" required>
                <label for="username">Nombre</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label for="password">Contraseña</label>
            </div>
            <button type="submit" class="login-btn">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>




