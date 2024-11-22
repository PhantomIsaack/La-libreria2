<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión para realizar una compra.";
    exit();
}

$usuario_id = $_SESSION['usuario_id'];


$sql = "SELECT c.cantidad, p.id_producto, p.precio 
        FROM carrito c 
        JOIN productos p ON c.id_producto = p.id_producto 
        WHERE c.id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Tu carrito está vacío.";
    exit();
}

$conn->begin_transaction();

try {

    $total = 0;
    while ($producto = $result->fetch_assoc()) {
        $subtotal = $producto['cantidad'] + $producto['precio'];
        $total += $subtotal;
    }

    $venta_sql = "INSERT INTO ventas (id_usuario, total) VALUES (?, ?)";
    $stmt_venta = $conn->prepare($venta_sql);
    $stmt_venta->bind_param("id", $usuario_id, $total);
    $stmt_venta->execute();
    $venta_id = $stmt_venta->insert_id; 
    $result->data_seek(0); 
    $detalle_sql = "INSERT INTO detalle_venta (id_venta, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)";
    $stmt_detalle = $conn->prepare($detalle_sql);
    
    while ($producto = $result->fetch_assoc()) {
        $stmt_detalle->bind_param("iiid", $venta_id, $producto['id_producto'], $producto['cantidad'], $producto['precio']);
        $stmt_detalle->execute();
    }


    $conn->query("DELETE FROM carrito WHERE id_usuario = '$usuario_id'");

    $conn->commit();

    echo "Compra realizada con éxito. Tu total es: $" . number_format($total, 2) . " MXN.";
} catch (Exception $e) {

    $conn->rollback();
    echo "Error al procesar la compra: " . $e->getMessage();
}
?>
