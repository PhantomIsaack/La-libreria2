<?php
$servername = "localhost";  
$username = "root";  
$password = "852456";  
$dbname = "la_libreria";  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
