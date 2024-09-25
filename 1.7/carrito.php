<?php 
$indexpage_css = 'estilos/carro.css';
include 'encabezado.php';
?>

<section id="carrito">
<article class="narrable">
        <h2>Tu carrito</h2>
        <h3>Tus productos son:</h3>
        <div class="producto">
            <img src="https://m.media-amazon.com/images/I/41lm0iHAvuL._SY445_SX342_.jpg" alt="Portada del libro Harry Potter">
            <div class="producto-info">
                <p>1 libro electrónico: Harry Potter...</p>
                <p>Subtotal: $749.00 MXN </p>
                <p>Total Imp. incluidos: $868.84 MXN </p>
            </div>
            <button class=" btn eliminar narrable">Eliminar</button>
        </div>

        <div class="acciones">
            <button class="btn proceder narrable" onclick="window.location.href='proceder.php'">Proceder al pago</button>
            <button class="btn cancelar narrable">Cancelar</button>
        </div>
    </section>
</article>


<?php include 'footer.php'; ?>