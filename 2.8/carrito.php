<?php
$indexpage_css = 'estilos/carro.css';
include 'encabezado.php';
include 'conexion.php'; 

if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión para ver tu carrito.";
    exit();
}

$usuario_id = $_SESSION['usuario_id']; 
$sql = "SELECT c.cantidad, p.id_producto, p.titulo, p.precio, p.imagen_url 
        FROM carrito c 
        JOIN productos p ON c.id_producto = p.id_producto 
        WHERE c.id_usuario = '$usuario_id'";
$result = $conn->query($sql);
$total = 0;
?>

<section id="carrito">
<article class="narrable">
    <h2>Tu carrito</h2>
    <h3>Tus productos son:</h3>

    <?php if ($result->num_rows == 0): ?>
        <p>Tu carrito está vacío.</p>
    <?php else: ?>
        <div id="productos-container">
            <?php while ($producto = $result->fetch_assoc()): ?>
                <div class="producto" id="producto-<?php echo $producto['id_producto']; ?>">
                    <img src="<?php echo $producto['imagen_url']; ?>" alt="Portada del libro <?php echo $producto['titulo']; ?>">
                    <div class="producto-info">
                        <p><?php echo $producto['cantidad']; ?> libro(s) electrónico(s): <?php echo $producto['titulo']; ?></p>
                        <p>Precio: $<?php echo $producto['precio']; ?> MXN </p>
                    </div>
                    <button class="btn eliminar narrable" onclick="eliminarProducto(<?php echo $producto['id_producto']; ?>)">Eliminar</button>
                </div>
                <?php 
                $subtotal = $producto['cantidad'] + $producto['precio'];
                $total += $subtotal; 
                ?>
            <?php endwhile; ?>
        </div>
        <div class="total">
        <h3>Total: $<?php echo number_format($total, 2); ?> MXN</h3>
        </div>
    <?php endif; ?>

    <div class="acciones">
    <button class="btn proceder narrable" onclick="procederPago()">Proceder al pago</button>
    </div>
</article>
</section>


<div id="paymentModal" class="modal">
    <div class="modal-content">
        <h3>Ingresa tus datos de pago </h3>
        <form id="paymentForm">
            <label for="cardNumber">Número de tarjeta:</label>
            <input type="text" id="cardNumber" class="input-number" placeholder="XXXX-XXXX-XXXX-XXXX" required><br>
            <label for="expDate">Fecha de expiración:</label>
            <input type="text" id="expDate" placeholder="MM/AA" class="input-number" required><br>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" placeholder="123"  class="input-number" required><br>
            <button type="button" class="btn btn-realizar-pago" onclick="simularPago()">Realizar pago (simulación)</button>
        </form>
        <button class="btn cerrar" onclick="cerrarModal()">Cancelar</button>
    </div>
</div>


<script>
function procederPago() {

    const productosContainer = document.getElementById("productos-container");

    if (!productosContainer || productosContainer.children.length === 0) {
        alert("No hay nada en tu carrito.");
        return; 
    }
    document.getElementById("paymentModal").style.display = "block";
}

function cerrarModal() {
    document.getElementById("paymentModal").style.display = "none";
}

function simularPago() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "procesar_venta.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            if (xhr.responseText.includes("Venta procesada")) {

                location.reload(); 
            }
        }
    };
    xhr.send();
}

function eliminarProducto(productId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "eliminar_carrito.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
            if (xhr.responseText.includes("Producto eliminado")) {
                const productoDiv = document.getElementById('producto-' + productId);
                productoDiv.remove();
                location.reload(); 
            }
        }
    };
    xhr.send("id_producto=" + productId);
}
</script>

<?php include 'footer.php'; ?>
