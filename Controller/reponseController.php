<?php
require_once(__DIR__ . '/../config.php');
require_once(__DIR__ . '/../Model/reponse.php');

class reponseController
{
    


    public function list_rep()
    {
        $sql = "SELECT * FROM reponse";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function delete_rep($id_rep)
    {
        $sql = "DELETE FROM reponse WHERE id_rep = :id_rep";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_rep', $id_rep);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function add_rep($reponse, $id_rec)
{
    var_dump($reponse);
    $sql = "INSERT INTO reponse (id_rep, id_rec, date_rep, contenu_rep) 
            VALUES (NULL, :id_rec, :date_rep, :contenu_rep)";
    $db = config::getConnexion();

    try {
        // Start a transaction to ensure both operations succeed or fail together
        $db->beginTransaction();

        // Insert the response into the reponse table
        $query = $db->prepare($sql);
        $date_rep = $reponse->getDateRep() ? $reponse->getDateRep()->format('Y-m-d') : (new DateTime())->format('Y-m-d');
        $query->execute([
            'date_rep' => $date_rep,
            'contenu_rep' => $reponse->getContenu(),
            'id_rec' => $id_rec
        ]);

        // Update the status of the reclamation to 'traitée'
        $updateStatusSql = "UPDATE reclamations SET status = :status WHERE id_rec = :id_rec";
        $updateStatusQuery = $db->prepare($updateStatusSql);
        $updateStatusQuery->execute([
            'status' => 'traitée',  // Set the status to 'traitée'
            'id_rec' => $id_rec
        ]);

        // Commit the transaction
        $db->commit();
    } catch (Exception $e) {
        // In case of an error, rollback the transaction
        $db->rollBack();
        echo 'Error: ' . $e->getMessage();
    }
}


    function update_rep($reponse, $id_rep)
{
    var_dump($reponse); // Pour déboguer et vérifier la valeur de $reponse
    try {
        $db = config::getConnexion();
        
        // Utilisation de la date actuelle si aucune date n'est spécifiée
        $date_rep = $reponse->getDateRep() ? $reponse->getDateRep()->format('Y-m-d') : (new DateTime())->format('Y-m-d');

        // Requête SQL corrigée
        $query = $db->prepare(
            'UPDATE reponse SET 
                date_rep = :date_rep,
                contenu_rep = :contenu_rep
            WHERE id_rep = :id_rep'
        );

        // Exécution de la requête
        $query->execute([
            'id_rep' => $id_rep,
            'contenu_rep' => $reponse->getContenu(),
            'date_rep' => $date_rep
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    }
}


    function show_rep($id_rep)
    {
        $sql = "SELECT * from reponse where id_rep = $id_rep";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reponse = $query->fetch();
            return $reponse;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
