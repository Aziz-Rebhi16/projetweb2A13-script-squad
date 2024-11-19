<?php
include(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/Ticket.php');

class TicketController
{
    public function listTicket()
    {
        $sql = "SELECT * FROM ticket";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteTicket($id)
    {
        $sql = "DELETE FROM ticket WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addTicket($ticket)
    {   var_dump($ticket);
        $sql = "INSERT INTO ticket
        VALUES (NULL, :musee_name,:location, :date, :time, :price, :disponible, :category)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'musee_name' => $ticket->getMusee_name(),
                'location' => $ticket->getLocation(),
                'date' => $ticket->getDate()->format('d-m-y'), 
                'time' => $ticket->getTime()->format('H:i:s'),
                'price' => $ticket->getPrice(),
                'disponible' => $ticket->isDisponible() ? 1 : 0, 
                'category' => $ticket->getCategory()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateTicket($ticket, $id)
{
    var_dump($ticket);
    try {
        $db = config::getConnexion();

        $query = $db->prepare(
            'UPDATE ticket SET 
                musee_name = :musee_name,
                location = :location,
                date = :date,
                time = :time,
                price = :price,
                disponible = :disponible,
                category = :category
            WHERE id = :id'
        );

        $query->execute([
            'id' => $id,
            'musee_name' => $ticket->getMusee_name(),
            'location' => $ticket->getLocation(),
            'date' => $ticket->getDate()->format('d-m-y'), 
            'time' => $ticket->getTime()->format('H:i:s'),
            'price' => $ticket->getPrice(),
            'disponible' => $ticket->isDisponible() ? 1 : 0, 
            'category' => $ticket->getCategory()
        ]);

        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    }
}


    function showTicket($id)
    {
        $sql = "SELECT * from ticket where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $ticket = $query->fetch();
            return $ticket;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
