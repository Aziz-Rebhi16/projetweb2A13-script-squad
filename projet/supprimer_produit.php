<?php  
include_once 'db.php';
include_once 'produit.php';

class ProduitManager {
    // Méthode pour supprimer un produit en fonction de son ID
    public function deleteProduit($id) {
        // SQL pour supprimer un produit par son ID
        $sql = "DELETE FROM produits WHERE id = :id";  // Assurez-vous que la table s'appelle bien 'produits'
        
        // Obtenez la connexion à la base de données
        $db = Database::getConnexion();
        
        // Préparez la requête SQL
        $req = $db->prepare($sql);
        
        // Liez la valeur de l'ID
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        
        try {
            // Exécutez la requête
            $req->execute();
            echo "Produit supprimé avec succès !";  // Message de succès
        } catch (Exception $e) {
            // En cas d'erreur, arrêtez l'exécution et affichez l'erreur
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
