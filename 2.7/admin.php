<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión La libreria</title>
    <link rel="stylesheet" href="estilos/principal.css">
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="POST" class="login-form">
            <h2>La libreria</h2>
            <h2>Administrador</h2>
            <div class="input-group">
                <input type="text" name="username" class="input-text" required>
                <label for="username">Nombre</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label for="password">Contraseña</label>
            </div>
            <button type="submit" class="login-btn">Iniciar Sesión</button>
        </form>
    </div>

    <script src="javajs/admca.js"></script>
</body>
</html>




