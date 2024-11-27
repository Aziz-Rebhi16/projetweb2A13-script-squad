<?php
// Inclure la classe ProduitManager pour accéder à la méthode de suppression
include_once 'supprimer_produit.php';

// Vérifier si l'ID du produit est passé via POST
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Créer une instance de ProduitManager
    $produitManager = new ProduitManager();
    
    // Appeler la méthode deleteProduit pour supprimer le produit
    $produitManager->deleteProduit($id);
    
    // Rediriger vers la page des produits après la suppression
    header('Location: listproduit.php');
    exit();
} else {
    echo "Aucun produit trouvé à supprimer.";
}
?>
