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

<script>
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

function procederPago() {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "procesar_venta.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert(xhr.responseText);
        }
    };
    xhr.send();
}
</script>

<?php include 'footer.php'; ?>



