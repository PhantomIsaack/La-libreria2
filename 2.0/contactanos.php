<?php 
$indexpage_css = 'estilos/contactanos.css';
include 'encabezado.php';
?>
<section class="page-title section-bordered">
    <h1 class="narrable">Contacta con nosotros</h1>
</section>

<main>
    <form id="contact-form" action="process_contact.php" method="POST">
        <label class="narrable" for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>

        <label class="narrable" for="lastname">Apellidos:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label class="narrable" for="email">Gmail:</label>
        <input type="email" id="email" name="email" required>

        <label class="narrable" for="phone">Teléfono:</label>
        <input type="tel" id="phone" name="phone" required>

        <label class="narrable" for="message">Consulta:</label>
        <textarea id="message" name="message" cols="32" rows="8" placeholder="Escribe tu comentario aquí..." required></textarea>

        <button type="submit" class="narrable">Enviar</button>
    </form>
    <article class="narrable">
    <h1>Otra forma de contactar</h1>
    <h3>Telefono: 55448877522</h3>
    <h3>Gmail:lalibreria13@gmail.com</h3>
    </article>
</main>

<?php include 'footer.php'; ?>
