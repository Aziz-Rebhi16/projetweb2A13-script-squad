<?php
session_start();
header('Content-Type: application/json');
include_once 'db.php'; // Connexion à la base de données

if (isset($_POST['produit_id'], $_POST['quantite'])) {
    $produit_id = (int)$_POST['produit_id'];
    $quantite = (int)$_POST['quantite'];

    try {
        $db = Database::getConnexion();

        $sql = "SELECT * FROM produits WHERE id = :produit_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
        $stmt->execute();
        $produit = $stmt->fetch();

        if ($produit) {
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = [];
            }
            $_SESSION['panier'][$produit_id] = [
                'id' => $produit['id'],
                'nom' => $produit['nom_produit'],
                'prix' => $produit['prix_produit'],
                'quantite' => $quantite,
                'image' => $produit['image_produit']
            ];

            $sqlInsert = "INSERT INTO panier (produit_id, nom_produit, prix, quantite, image)
                          VALUES (:produit_id, :nom, :prix, :quantite, :image)
                          ON DUPLICATE KEY UPDATE
                          quantite = quantite + :quantite_update";
            $stmtInsert = $db->prepare($sqlInsert);
            $stmtInsert->execute([
                ':produit_id' => $produit['id'],
                ':nom' => $produit['nom_produit'],
                ':prix' => $produit['prix_produit'],
                ':quantite' => $quantite,
                ':quantite_update' => $quantite,
                ':image' => $produit['image_produit']
            ]);

            echo json_encode(['success' => true, 'message' => 'Produit ajouté au panier et à la base de données.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Produit introuvable.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur serveur : ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Données invalides.']);
}
