<?php
session_start();
include_once '../model/db.php'; // Connexion à la base de données

// Vérifier si les données sont envoyées
if (isset($_POST['id_produit'], $_POST['quantite'])) {
    $id_produit = (int)$_POST['id_produit'];
    $quantite = (int)$_POST['quantite'];

    // Vérifier si le produit existe dans la base de données
    $sql = "SELECT * FROM produits WHERE id = :id_produit";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
    $stmt->execute();
    $produit = $stmt->fetch();

    if ($produit) {
        // Ajouter au panier dans la session
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        $_SESSION['panier'][$id_produit] = [
            'id' => $produit['id'],
            'nom' => $produit['nom_produit'],
            'prix' => $produit['prix'],
            'quantite' => $quantite,
            'image' => $produit['image_produit']
        ];

        // Ajouter dans la table `panier` de la base de données
        $sqlInsert = "INSERT INTO panier (id_produit, nom_produit, prix, quantite, image)
                      VALUES (:id_produit, :nom, :prix, :quantite, :image)
                      ON DUPLICATE KEY UPDATE
                      quantite = quantite + :quantite_update";
        $stmtInsert = $db->prepare($sqlInsert);
        $stmtInsert->execute([
            ':id_produit' => $produit['id'],
            ':nom' => $produit['nom_produit'],
            ':prix' => $produit['prix'],
            ':quantite' => $quantite,
            ':quantite_update' => $quantite,
            ':image' => $produit['image_produit']
        ]);

        echo json_encode(['success' => true, 'message' => 'Produit ajouté au panier et à la base de données.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Produit introuvable.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Données invalides.']);
}
