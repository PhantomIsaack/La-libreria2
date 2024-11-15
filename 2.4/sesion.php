<?php 
$indexpage_css = 'estilos/sesion.css';
$indexja_js = 'javajs/sesion.js';
include 'encabezado.php';
require 'conexion.php';

if (isset($_POST['add_usuario'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    $check_sql = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    
    if ($count > 0) {
        echo "<script>alert('Este correo ya está registrado.');</script>";
    } else {
        // Generar el token
        $token = bin2hex(random_bytes(16));  // Genera un token de 32 caracteres
        $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
        
        // Insertar el usuario con el token
        $add_sql = "INSERT INTO usuarios (nombre, apellidos, telefono, email, password, token, confirmado) 
                    VALUES ('$nombre', '$apellidos', '$telefono', '$email', '$password', '$token', 0)";
        if ($conn->query($add_sql) === TRUE) {
            // Enviar correo con el token
            $subject = "Verificación de tu cuenta";
            $message = "Hola $nombre,\n\nPara completar tu registro, por favor confirma tu correo haciendo clic en el siguiente enlace:\n\n";
            $message .= "http://localhost/2.3/confirmar.php?token=$token\n\nGracias!  \n\nsu contraseña temporal es: $password";
            $headers = "From: noreply@lalibreriaayuditas.com";
            
            if (mail($email, $subject, $message, $headers)) {
                // Redirigir al usuario a una página de espera
                echo "<script>window.location.href = 'espera.php';</script>";
            } else {
                echo "<script>alert('Error enviando el correo de verificación.');</script>";
            }
        } else {
            $error_msg = $conn->error;
            echo "<script>alert('Error agregando Usuario: $error_msg');</script>";
        }
    }
}


$usuarios_sql = "SELECT * FROM usuarios"; 
$usuarios_result = $conn->query($usuarios_sql);
?>

<section class="page-title section-bordered">
    <h1 class="narrable">Sesión</h1>
</section>

<main>
<section id="login-section">
    <h2 class="narrable">Iniciar Sesión</h2>
    <form id="login-form" action="inicio-sesion.php" method="post">
        <label for="login-email" class="narrable">Email:</label>
        <input type="email" id="login-email" name="email" novalidate>
        <label for="login-password" class="narrable">Contraseña:</label>
        <input type="password" id="login-password" name="password" novalidate>
        <button type="submit" class="sebutton narrable">Iniciar Sesión</button>
        <p id="login-error" class="error-message narrable" aria-live="assertive"></p>
        <a href="contactanos.php" id="forgot-password" class="narrable">¿Has olvidado tu contraseña?</a>
    </form>
</section>

<section id="register-section">
    <h2 class="narrable">Crear Cuenta</h2>
    <p class="narrable">Crea tu cuenta. Podrás usar tu email y la contraseña elegida para entrar a tu cuenta y seguir tus pedidos.</p>
    <form id="register-form" action="sesion.php" method="post">
        <label for="name" class="narrable">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="input-text" novalidate>
        <label for="apellidos" class="narrable">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" class="input-text" novalidate>
        <label for="telefono" class="narrable">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" class="input-number" novalidate>
        <label for="correo" class="narrable">Email:</label>
        <input type="email" id="email" name="email" novalidate>
        <label for="contra" class="narrable">La contraseña se le generará automáticamente</label>
        <button type="submit" class="narrable sebutton" name="add_usuario">Registrarme</button>
        <p id="register-error" class="error-message narrable" aria-live="assertive"></p>
    </form>
</section>
</main>

<?php include 'footer.php'; ?>
