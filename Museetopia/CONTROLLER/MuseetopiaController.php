<?php
namespace museetopia;

use PDO;
use Exception;
use PDOException;

class MuseetopiaController {
    private $db;

    public function __construct() {
        $db = 'museetopia';
        $charset = 'utf8mb4';
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->db = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage(), (int)$e->getCode());
        }
    }

    public function listticket() {
        $sql = "SELECT * FROM ticket";
        try {
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function addticket($ticket) {
        $sql = "INSERT INTO ticket (musee_name, location, time, date, ticket_type, disponible, price) VALUES (:musee_name, :location, :time, :date, :ticket_type, :disponible, :price)";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':musee_name' => $ticket->musee_name,
                ':location' => $ticket->location,
                ':time' => $ticket->time,
                ':date' => $ticket->date->format('Y-m-d'),
                ':ticket_type' => $ticket->ticket_type,
                ':disponible' => $ticket->disponible,
                ':price' => $ticket->price
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function showticket($id){
        $sql = "SELECT * FROM ticket WHERE id = $id";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
            $ticket = $query->fetch();
            return $ticket;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function updateticket($tickets, $id){
     var_dump($tickets);
     try {
        $query = $this->db->prepare(
        'UPDATE ticket SET
        musee_name = :musee_name,
        location = :location,
        time = :time,
        date = :date,
        ticket_type = :ticket_type,
        disponible = :disponible,
        price = :price
        WHERE id = :id'
        );
        $query->execute([
            'musee_naem' => $tickets->musee_naem,
            'location' => $tickets->location,
            'time' => $tickets->time,
            'date' => $tickets->date,
            'ticket_type' => $tickets->ticket_type,
            'disponible' => $tickets->isdisponible() ? 1 : 0,
            'price' => $tickets->price,
            'id' => $id
        ]);
        echo $query->rowCount() . " records UPDATED successfully";
     } catch (Exception $e) {
         echo "Error: " . $e->getMessage();
     }
    }   
    function deleteticket($id){
        $sql = "DELETE FROM ticket WHERE id = $id";
        try {
            $query = $this->db->prepare($sql);
            $query->execute();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>