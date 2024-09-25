<?php 
$indexpage_css = 'estilos/proceder.css';
$indexja_js = 'javajs/proceder.js';
include 'encabezado.php';
?>

<script src="<?php echo $indexja_js; ?>"></script>

<main>

<article class="narrable carrito-superior">
    <h2 class="narrable">Tu carrito</h2>
    <h3 class="narrable">Tus productos son:</h3>
    <div class="producto">
        <img src="https://m.media-amazon.com/images/I/41lm0iHAvuL._SY445_SX342_.jpg" alt="Portada del libro Harry Potter">
        <div class="producto-info">
            <p class="narrable">1 libro electrónico: Harry Potter...</p>
            <p class="narrable">Subtotal: $749.00 MXN </p>
            <p class="narrable">Total Imp. incluidos: $868.84 MXN </p>
        </div>
    </div>
</article>


        <div class="container">
            <!-- Sección de inicio de sesión -->
            <section class="login-section" id="loginSection">
                <h2 class="narrable">1. Tus datos</h2>
                <form id="loginForm">
                    <label for="email" class="narrable">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="password"  class="narrable">Contraseña:</label>
                    <input type="password" id="password" name="password" required>

                    <button type="submit" class="gebutton inbutton narrable">Iniciar sesión</button>
                    <button type="button" class="gebutton create-account narrable">Crear nuevo usuario</button>
                </form>
            </section>

            <!-- Sección del formulario de registro (oculto por defecto) -->
            <section class="register-section" id="registerSection" style="display:none;">
                <h2 class="narrable">Crear nuevo usuario</h2>
                <form id="registerForm">
                    <label for="first-name"  class="narrable">Nombre:</label>
                    <input type="text" id="first-name" name="first-name" required>

                    <label for="last-name" class="narrable">Apellido:</label>
                    <input type="text" id="last-name" name="last-name" required>

                    <label for="new-email" class="narrable">Correo electrónico:</label>
                    <input type="email" id="new-email" name="new-email" required>

                    <label for="new-password" class="narrable">Contraseña:</label>
                    <input type="password" id="new-password" name="new-password" required>

                    <label for="confirm-password" class="narrable">Confirmar contraseña:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>

                    <button type="submit" class=" gebutton regibutton narrable" >Registrarse</button>
                    <button type="button" class=" gebutton back-to-login regrebutton narrable">Volver a Iniciar Sesión</button>
                </form>
            </section>

            <!-- Sección del método de pago -->
            <section class="payment-section" id="paymentSection">
                <h2 class="narrable">2. Método de pago</h2>
                <form id="paymentForm">
                    <label>
                        <input type="radio" name="payment-method" value="tarjeta" checked>
                        Tarjeta Bancaria
                    </label>

                    <label for="card-number" class="narrable">Número de tarjeta:</label>
                    <input type="text" id="card-number" name="card-number" required>

                    <label for="card-holder" class="narrable">Titular de la tarjeta:</label>
                    <input type="text" id="card-holder" name="card-holder" required>

                    <div class="expiration-date">
                        <label for="month" class="narrable" >Mes:</label>
                        <input type="text" id="month" name="month" placeholder="MM" required>

                        <label for="year" class="narrable">Año:</label>
                        <input type="text" id="year" name="year" placeholder="AAAA" required>
                    </div>

                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required>

                    <div class="save-card">
                        <label>
                            <input type="checkbox" name="save-card">
                            Utilizar esta tarjeta para realizar sus futuras compras más rápidamente
                        </label>
                    </div>

                    <div class="buttons">
                        <button type="submit" class="finbutton gebutton narrable">Finalizar compra</button>
                        <button type="button" class="canbutton gebutton narrable" >Cancelar</button>
                    </div>
                </form>
            </section>
        </div>
    </main>

<?php include 'footer.php'; ?>