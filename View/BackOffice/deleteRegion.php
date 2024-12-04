<?php
include '../../controller/RegionController.php';

try {
    // Instancier le contrôleur des régions
    $regionController = new RegionController();

    // Vérifier si l'ID est présent dans l'URL et est un entier valide
    if (isset($_GET["id"]) && filter_var($_GET["id"], FILTER_VALIDATE_INT)) {
        // Appeler la méthode deleteRegion du contrôleur avec l'ID
        $regionId = intval($_GET["id"]);
        if ($regionController->deleteRegion($regionId)) {
            // Rediriger vers la liste des régions si la suppression a réussi
            header('Location: regionList.php?message=success');
            exit;
        } else {
            // Gérer l'erreur si la suppression a échoué
            throw new Exception("Erreur lors de la suppression de la région.");
        }
    } else {
        // Si l'ID est invalide ou manquant
        throw new Exception("ID invalide ou manquant.");
    }
} catch (Exception $e) {
    // Afficher un message d'erreur en cas d'exception
    echo "<h1>Erreur :</h1>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<a href='regionList.php'>Retour à la liste des régions</a>";
    exit;
}
?>
