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

    function add_rep($reponse)
{
    var_dump($reponse);
    $sql = "INSERT INTO reponse (id_rep, id_rep, date_rep, contenu_rep) 
            VALUES (NULL, NULL, :date_rep, :contenu_rep)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $date_rep = $reponse->getDateRep() ? $reponse->getDateRep()->format('Y-m-d') : (new DateTime())->format('Y-m-d');
        $query->execute([
            'date_rep' => $date_rep,
            'contenu_rep'=>$reponse->getContenu()
            
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function update_rep($reponse, $id_rep)
{
    var_dump($reponse);
    try {
        $db = config::getConnexion();
        $date_rep = $reponse->getDateRep() ? $reponse->getDateRep()->format('Y-m-d') : (new DateTime())->format('Y-m-d');


        $query = $db->prepare(
            'UPDATE reponse SET 
                date_rep = :date_rep,
                contenu_rep = :contenu_rep,
                
            WHERE id_rep = :id_rep'
        );

        $query->execute([
            'id_rep' => $id_rep,
            'contenu_rep' => $reponse->getContenu(),
            'date_rep' => $date_rep, 
            
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
