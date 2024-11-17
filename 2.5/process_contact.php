<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $message = htmlspecialchars(trim($_POST['message']));

 
    $to = "support@ecorecetas.com";
    $subject = "Nuevo mensaje de contacto de $name $lastname";


    $body = "Nombre: $name $lastname\n";
    $body .= "Correo: $email\n";
    $body .= "Teléfono: $phone\n";
    $body .= "Mensaje: \n$message\n";


    $headers = "From: support@ecorecetas.com\r\n";
    $headers .= "Reply-To: $email\r\n";

  
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
}


