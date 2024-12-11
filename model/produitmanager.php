<?php
class ProduitManager {

    // Méthode pour récupérer un produit par son ID
    public function getProduitById($id) {
        $sql = "SELECT * FROM produits WHERE id = :id";
        $db = Database::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour mettre à jour un produit
    public function updateProduit(Produit $produit, $id) {
        try {
            $db = Database::getConnexion();
            $query = $db->prepare(
                'UPDATE produits SET
                    nom_produit = :nom_produit,
                    prix_produit = :prix_produit,
                    description_produit = :description_produit,
                    image_produit = :image_produit
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'nom_produit' => $produit->getNomProduit(),
                'prix_produit' => $produit->getPrixProduit(),
                'description_produit' => $produit->getDescription(),
                'image_produit' => $produit->getImage(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
