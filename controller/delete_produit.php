<?php
// delete_produit.php
include_once '../model/db.php';

// Vérifier si un ID est passé
if (isset($_POST['id'])) {
    $produit_id = (int)$_POST['id'];

    try {
        // Supprimer le produit de la base de données
        $sql = "DELETE FROM produits WHERE id = :produit_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
        $stmt->execute();

        // Supprimer également de la table `panier` si nécessaire
        $sqlPanier = "DELETE FROM panier WHERE produit_id = :produit_id";
        $stmtPanier = $db->prepare($sqlPanier);
        $stmtPanier->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
        $stmtPanier->execute();

        // Redirection après la suppression
        header('Location: ../view/backOffice/listproduit.php?success=1');
        exit();
    } catch (Exception $e) {
        // En cas d'erreur
        header('Location: ../view/backOffice/listproduit.php?error=1');
        exit();
    }
} else {
    // Si aucun ID n'est passé, rediriger vers la liste des produits
    header('Location:../view/backOffice/listproduit.php');
    exit();
}
