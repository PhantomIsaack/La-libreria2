<?php
$servername = "localhost";  
$username = "u530589356_root";  
$password = "192837465Aii";  
$dbname = "u530589356_la_libreria";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
