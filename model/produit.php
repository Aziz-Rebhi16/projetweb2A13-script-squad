<?php
// Assurez-vous que la classe Produits est correctement définie ici
include_once 'db.php';

class Produits
{
    // Ajouter un produit
    public function ajouter_produit($nom, $description, $prix, $image)
    {
        $sql = "INSERT INTO produits (nom_produit, description_produit, prix_produit, image_produit) 
                VALUES (:nom_produit, :description_produit, :prix_produit, :image_produit)";
        $db = Database::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_produit' => $nom,
                'description_produit' => $description,
                'prix_produit' => $prix,
                'image_produit' => $image
            ]);
            echo "Produit ajouté avec succès !";
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    

    // Récupérer tous les produits
    public function getProduits()
    {
        $sql = "SELECT * FROM produits";
        $db = Database::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            return [];
        }
    }
    
}


?>
