<?php
class Produitss
{
    public function ajouter_produit($nom, $description, $prix, $image)
    {
        $sql = "INSERT INTO produits (nom_produit, description_produit, prix_produit, image_produit) 
                VALUES (:nom_produit, :description_produit, :prix_produit, :image_produit)";
        $db = Database::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                ':nom_produit' => $nom,
                ':description_produit' => $description,
                ':prix_produit' => $prix,
                ':image_produit' => $image
            ]);
            echo "Produit ajouté avec succès !";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function getProduits()
    {
        $sql = "SELECT * FROM produits";
        $db = Database::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return [];
        }
    }
}
?>
