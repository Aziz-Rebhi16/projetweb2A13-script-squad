<?php
include '../../controller/MuseeController.php';

// Instancier le contrôleur des musées
$museeController = new MuseeController();

// Vérifier si l'ID est présent dans l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Appeler la méthode deleteMusee du contrôleur
    $museeController->deleteMusee($_GET["id"]);
}

// Rediriger l'utilisateur vers la page de la liste des musées
header('Location: museeList.php');
exit;
?> 
