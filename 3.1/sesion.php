<?php


$indexpage_css = 'estilos/sesion.css';
$indexja_js = 'javajs/sesion.js';
include 'encabezado.php';
require 'conexion.php'; // Verifica que este archivo exista y esté configurado correctamente

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Habilitar el reporte de errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['add_usuario'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Comprobar si el correo ya está registrado
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
        // Generar token y contraseña
        $token = bin2hex(random_bytes(16));
        $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8);

        // Insertar usuario en la base de datos
        $add_sql = "INSERT INTO usuarios (nombre, apellidos, telefono, email, password, token, confirmado) 
                    VALUES (?, ?, ?, ?, ?, ?, 0)";
        $stmt = $conn->prepare($add_sql);
        $stmt->bind_param('ssssss', $nombre, $apellidos, $telefono, $email, $password, $token);

        if ($stmt->execute()) {
            $stmt->close();

            // Configurar y enviar el correo usando PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configuración del servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.hostinger.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'noreply@lalibreriaayuditas.com'; // Correo de origen
                $mail->Password = 'Noreply@2024.'; // Contraseña del correo
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Usar cifrado SSL/TLS
                $mail->Port = 465;

                // Configuración del correo
                $mail->setFrom('noreply@lalibreriaayuditas.com', 'La Librería Ayuditas');
                $mail->addAddress($email, $nombre);

                // Contenido del correo
                $mail->CharSet = 'UTF-8';
                $mail->isHTML(true);
                $mail->Subject = "Verificación de tu cuenta";
                $mail->Body = "
                    <p>Hola $nombre,</p>
                    <p>Para completar tu registro, por favor confirma tu correo haciendo clic en el siguiente enlace:</p>
                    <p><a href='https://lalibreriaayuditas.com/confirmar.php?token=$token'>Confirmar cuenta</a></p>
                    <p>Tu contraseña temporal es: <strong>$password</strong></p>
                ";

                // Intentar enviar el correo
                if ($mail->send()) {
                    header("Location: espera.php");
                    exit();
                } else {
                    echo "Error al enviar correo: " . $mail->ErrorInfo;
                }
            } catch (Exception $e) {
                echo "Error en PHPMailer: " . $e->getMessage();
            }
        } else {
            echo "<script>alert('Error al registrar el usuario.');</script>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $recaptcha_secret = '6LdK8ZAqAAAAAL8zk_r2oupYErfC5dRxteVRnIE-';

    $recaptcha_response = $_POST['g-recaptcha-response'];

 
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_keys = json_decode($response, true);


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
         <div class="g-recaptcha" data-sitekey="6LdK8ZAqAAAAAL1lSK-4llbpAN3e2_eh8OL9ilva" data-callback="enableSubmit"></div>
        <button type="submit" class="sebutton narrable" id="login-btn" disabled>Iniciar Sesión</button>
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
        <div class="g-recaptcha" data-sitekey="6LdK8ZAqAAAAAL1lSK-4llbpAN3e2_eh8OL9ilva" data-callback="enableSubmit"></div>

            <button type="submit" class="narrable sebutton" name="add_usuario" id="submit-btn" disabled>Registrarme</button>
        <p id="register-error" class="error-message narrable" aria-live="assertive"></p>
    </form>
</section>
</main>


<script>
    // Habilitar el botón cuando el reCAPTCHA sea válido
    function enableSubmit() {
        document.getElementById('submit-btn').disabled = false;
    }
</script>


<script>
    // Habilitar el botón cuando el reCAPTCHA sea válido
    function enableSubmit() {
        document.getElementById('login-btn').disabled = false;
    }
</script>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<style>
    .g-recaptcha {
        transform: scale(0.85); /* Cambia el tamaño (0.85 es 85%) */
        transform-origin: 0 0; /* Ajusta el origen para evitar desplazamientos */
    }
</style>





<?php include 'footer.php'; ?> 
