<?php
require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/../Model/reclamation.php');

class reclamationController
{
    public function list_rec()
    {
        $sql = "SELECT * FROM reclamations";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function delete_rec($id_rec)
    {
        $sql = "DELETE FROM reclamations WHERE id_rec = :id_rec";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rec', $id_rec);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function add_rec($reclamation)
{
    var_dump($reclamation);
    $sql = "INSERT INTO reclamations (id_rec, nom, prenom, date_rec, sujet, status, description) 
            VALUES (NULL, :nom, :prenom, :date_rec, :sujet, :status, :description)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $date_rec = $reclamation->getDateRec() ? $reclamation->getDateRec()->format('Y-m-d') : (new DateTime())->format('Y-m-d');
        $query->execute([
            'nom' => $reclamation->getNom(),
            'prenom' => $reclamation->getPrenom(),
            'date_rec' => $date_rec,
            'sujet' => $reclamation->getSujet(),
            'status' => $reclamation->getStatus(),
            'description' => $reclamation->getDescription()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function update_rec($reclamation, $id_rec)
{
    var_dump($reclamation);
    try {
        $db = config::getConnexion();
        $date_rec = $reclamation->getDateRec() ? $reclamation->getDateRec()->format('Y-m-d') : (new DateTime())->format('Y-m-d');


        $query = $db->prepare(
            'UPDATE reclamations SET 
                nom = :nom,
                prenom = :prenom,
                date_rec = :date_rec,
                sujet = :sujet,
                status = :status,
                description = :description
            WHERE id_rec = :id_rec'
        );

        $query->execute([
            'id_rec' => $id_rec,
            'nom' => $reclamation->getNom(),
            'prenom' => $reclamation->getPrenom(),
            'date_rec' => $date_rec, 
            'sujet' => $reclamation->getSujet(),
            'status' => $reclamation->getStatus(),
            'description' => $reclamation->getDescription()
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    }
}


    function show_rec($id_rec)
    {
        $sql = "SELECT * from reclamations where id_rec = $id_rec";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function getNewReclamationsCount() {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT COUNT(*) FROM reclamations WHERE status = 'En cours'");
        $query->execute();
        return $query->fetchColumn();
    }
}
