<?php
include 'C:/xampp/htdocs/Reclamation/Controller/reponseController.php';

var_dump($_GET);
if (isset($_GET["id_rep"]) && is_numeric($_GET["id_rep"])) {
    $id_rep = $_GET["id_rep"];

   
    $reponseController = new reponseController();

    $reponseController->delete_rep($id_rep);

    header('Location: tables.php');
    exit();
} else {
    echo "Invalid ID or missing parameter!";
}
?>