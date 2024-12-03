<?php
include(__DIR__ . '/../configReservation.php');
include(__DIR__ . '/../Model/reservation.php');

class ReservationController
{
    public function listReservation()
    {
        $sql = "SELECT * FROM reservation";
        $db = config2::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReservation($id)
    {
        $sql = "DELETE FROM reservation WHERE id = :id";
        $db = config2::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReservation($reservation)
    {
        var_dump($reservation);

        $sql = "INSERT INTO reservation (name, surname, email, phone, musee_name, date, time, price, category, ticket_id) 
                VALUES (:name, :surname, :email, :phone, :musee_name, :date, :time, :price, :category, :ticket_id)";
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'name' => $reservation->getName(),
                'surname' => $reservation->getSurName(),
                'email' => $reservation->getEmail(),
                'phone' => $reservation->getPhone(),
                'musee_name' => $reservation->getMusee_name(),
                'date' => $reservation->getDate()->format('Y-m-d') ,
                'time' => $reservation->getTime()->format('H:i:s') ,
                'price' => $reservation->getPrice(),
                'category' => $reservation->getCategory(),
                'ticket_id' => $reservation->getTicketId() // Corrected method name
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReservation($reservation, $id)
    {
        var_dump($reservation);
        try {
            $db = config2::getConnexion();

            $query = $db->prepare(
                'UPDATE reservation SET 
                    name = :name,
                    surname = :surname,
                    email = :email,
                    phone = :phone,
                    musee_name = :musee_name,
                    date = :date,
                    time = :time,
                    price = :price,
                    category = :category
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'name' => $reservation->getName(),
                'surname' => $reservation->getSurName(),
                'email' => $reservation->getEmail(),
                'phone' => $reservation->getPhone(),
                'musee_name' => $reservation->getMusee_name(),
                'date' => $reservation->getDate()->format('Y-m-d'), 
                'time' => $reservation->getTime()->format('H:i:s'),
                'price' => $reservation->getPrice(),
                'category' => $reservation->getCategory()
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); 
        }
    }


    function showReservation($id)
    {
        $sql = "SELECT * from reservation where id = $id";
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reservation = $query->fetch();
            return $reservation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function showR($ticket_id)
    {
        try{
            $pdo = config2::getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM reservation WHERE ticket_id = :ticket_id'
            );
            $query->execute([
                'ticket_id' => $ticket_id
            ]); 
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function showRes(){
        try{
            $pdo = config2::getConnexion();
            $query = $pdo->prepare(
                'SELECT * FROM reservation'
            );
            $query->execute();
            return $query->fetchAll();
        }catch(PDOException $e){
            $e->getMessage();
        }
    }

    public function getReservationByTicketId($ticket_id)
    {
        $sql = "SELECT * FROM reservation WHERE ticket_id = :ticket_id";
        $db = config2::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['ticket_id' => $ticket_id]);
            return $query->fetch();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
