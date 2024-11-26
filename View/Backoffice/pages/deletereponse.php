<?php
include 'C:/xampp/htdocs/Reclamation/Controller/reponseController.php';


if (isset($_GET["id_rep"]) && is_numeric($_GET["id_rep"])) {
    $id_rep = $_GET["id_rep"];

   
    $reponseController = new reclamationController();

    $reponseController->delete_rep($id_rep);

    header('Location: tables.php');
    exit();
} else {
    echo "Invalid ID or missing parameter!";
}
?>