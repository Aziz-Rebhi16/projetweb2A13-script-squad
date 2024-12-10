<?php
$destinataire = "abedayoub87@gmail.com";
$sujet = "Merci pour votre achat !";

$message = "<html><body>";
$message .= "<h1 style='color:red'>merci pour votre commande dans notre site</h1>";
$message .= "<p>votre commande va etre livrer après 48 heurs à l'adresse indiquée</p>";
$message .= "</body></html>";

$headers = "From: contact@museetopia.com\r\n";
$headers .= "Reply-To: contact@museetopia.com\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n";

if (mail($destinataire, $sujet, $message, $headers)) {
    echo "L'email a été envoyé !";
} else {
    echo "Une erreur est survenue !";
}
?>
