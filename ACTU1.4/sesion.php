<?php 
$indexpage_css = 'estilos/sesion.css';
include 'encabezado.php';
?>

<section class="page-title section-bordered">
    <h1 class="narrable">Sesión</h1>
</section>

<main>
    <section id="login-section">
        <h2 class="narrable">Iniciar Sesión</h2>
        <form action="inicio-sesion.php" method="post">
            <label for="login-email" class="narrable" >Email:</label>
            <input type="email" id="login-email" name="email" required>
            <label for="login-password" class="narrable">Contraseña:</label>
            <input type="password" id="login-password" name="password" required>
            <button type="submit" class="sebutton narrable">Iniciar Sesión</button>
            <a href="#" id="forgot-password" class="narrable">¿Has olvidado tu contraseña?</a>
        </form>
    </section>

    <section id="register-section">
        <h2 class="narrable">Crear Cuenta</h2>
        <p class="narrable">Crea tu cuenta. Podrás usar tu email y la contraseña elegida para entrar a tu cuenta y seguir tus pedidos.</p>
        <form action="registro-exitoso.html" method="post">
            <label for="register-name" class="narrable">Nombre:</label>
            <input type="text" id="register-name" name="name" required>
            <label for="register-lastname" class="narrable">Apellidos:</label>
            <input type="text" id="register-lastname" name="lastname" required>
            <label for="register-email" class="narrable">Email:</label>
            <input type="email" id="register-email" name="email" required>
            <label for="register-password" class="narrable">Contraseña:</label>
            <input type="password" id="register-password" name="password" required>
            <label for="register-phone" class="narrable">Teléfono:</label>
            <input type="tel" id="register-phone" name="phone" required>
            <button type="submit" class="narrable sebutton">Registrarme</button>
        </form>
    </section>
</main>


<?php include 'footer.php'; ?>