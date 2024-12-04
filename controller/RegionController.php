<?php
include_once(__DIR__ . '/../config.php');     
include_once(__DIR__ . '/../Model/Region.php');
include_once(__DIR__ . '/../Controller/MuseeController.php'); // Inclusion du MuseeController

class RegionController
{
    public function listRegions() 
    {
        $sql = "SELECT * FROM regions";   
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteRegion($id)
    {
        $sql = "DELETE FROM regions WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addRegion($region)
    {
        $sql = "INSERT INTO regions  
        VALUES (NULL, :nom, :description, :image)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $region->getNom(),
                'description' => $region->getDescription(),
                'image' => $region->getImage(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateRegion($region, $id)
    {
        try {
            $db = config::getConnexion();

            $query = $db->prepare(
                'UPDATE regions SET 
                    nom = :nom,
                    description = :description,
                    image = :image
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'nom' => $region->getNom(),
                'description' => $region->getDescription(),
                'image' => $region->getImage(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); 
        }
    }

    function showRegion($id)
    {
        $sql = "SELECT * from regions where id = :id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_INT);
            $query->execute();

            $region = $query->fetch();
            return $region;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Ajouter une méthode pour récupérer les musées d'une région
    public function getMuseesByRegion($regionId)
    {
        $museeController = new MuseeController(); // Créer une instance de MuseeController
        return $museeController->getMuseesByRegion($regionId); // Utiliser la méthode dans MuseeController
    }
}
