<?php
include_once(__DIR__ . '/../config.php');
include_once(__DIR__ . '/../Model/Musee.php');    

class MuseeController
{
    // Récupérer la liste de tous les musées
    public function listMusees() 
    {
        $sql = "SELECT * FROM musees";  

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    

    // Supprimer un musée par son ID
    function deleteMusee($id)
    {
        $sql = "DELETE FROM musees WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    // Ajouter un nouveau musée
    function addMusee($musee)
    {
        $sql = "INSERT INTO musees  
        VALUES (NULL, :nom, :adresse, :region_id, :jours_fermeture, :description, :date_creation)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $musee->getNom(),
                'adresse' => $musee->getAdresse(),
                'region_id' => $musee->getRegion_id(),
                'jours_fermeture' => $musee->getJoursFermeture(),
                'description' => $musee->getDescription(),
                'date_creation' => $musee->getDateCreation()->format('Y-m-d'),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Mettre à jour les informations d'un musée
    function updateMusee($musee, $id)
    {
        try {
            $db = config::getConnexion();

            $query = $db->prepare(
                'UPDATE musees SET 
                    nom = :nom,
                    adresse = :adresse,
                    region_id = :region_id,
                    jours_fermeture = :jours_fermeture,
                    description = :description,
                    date_creation = :date_creation
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'nom' => $musee->getNom(),
                'adresse' => $musee->getAdresse(),
                'region_id' => $musee->getRegion_id(),
                'jours_fermeture' => $musee->getJoursFermeture(),
                'description' => $musee->getDescription(),
                'date_creation' => $musee->getDateCreation()->format('Y-m-d'),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); 
        }
    }

    // Afficher les informations d'un musée spécifique par son ID
    function showMusee($id)
    {
        $sql = "SELECT * from musees where id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $musee = $query->fetch();
            return $musee;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Récupérer les musées associés à une région spécifique
    public function getMuseesByRegion($regionId)
    {
        $sql = "SELECT * FROM musees WHERE region_id = :region_id";  
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':region_id', $regionId);
            $query->execute();
            $musees = $query->fetchAll();
            return $musees;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Méthode alternative pour lister les musées d'une région, similaire à getMuseesByRegion
    public function listMuseesByRegion($regionId)
    {
        $sql = "SELECT * FROM musees WHERE region_id = :region_id";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':region_id', $regionId, PDO::PARAM_INT);
        
        try {
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
