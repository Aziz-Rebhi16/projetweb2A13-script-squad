<?php
include 'C:/xampp/htdocs/Reclamation/Controller/reclamationController.php';


if (isset($_GET["id_rec"]) && is_numeric($_GET["id_rec"])) {
    $id_rec = $_GET["id_rec"];

   
    $reclamationController = new reclamationController();

    $reclamationController->delete_rec($id_rec);

    header('Location: tables.php');
    exit();
} else {
    echo "Invalid ID or missing parameter!";
}
?>