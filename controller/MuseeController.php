<?php
include(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/Musee.php');

class MuseeController
{
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

    function addMusee($musee)
    {
        $sql = "INSERT INTO musees  
        VALUES (NULL, :nom, :adresse, :region, :jours_fermeture, :description, :date_creation)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $musee->getNom(),
                'adresse' => $musee->getAdresse(),
                'region' => $musee->getRegion(),
                'jours_fermeture' => $musee->getJoursFermeture(),
                'description' => $musee->getDescription(),
                'date_creation' => $musee->getDateCreation()->format('Y-m-d'),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateMusee($musee, $id)
    {
        try {
            $db = config::getConnexion();

            $query = $db->prepare(
                'UPDATE musees SET 
                    nom = :nom,
                    adresse = :adresse,
                    region = :region,
                    jours_fermeture = :jours_fermeture,
                    description = :description,
                    date_creation = :date_creation
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'nom' => $musee->getNom(),
                'adresse' => $musee->getAdresse(),
                'region' => $musee->getRegion(),
                'jours_fermeture' => $musee->getJoursFermeture(),
                'description' => $musee->getDescription(),
                'date_creation' => $musee->getDateCreation()->format('Y-m-d'),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); 
        }
    }

    function showMusee($id)
    {
        $sql = "SELECT * from musees where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $musee = $query->fetch();
            return $musee;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
