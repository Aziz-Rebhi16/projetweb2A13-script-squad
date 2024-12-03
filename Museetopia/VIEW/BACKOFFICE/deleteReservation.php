<?php
include '../../CONTROLLER/ReservationController.php';

$reservationC = new reservationController();
$reservationC->deleteReservation($_GET["id"]);
header('Location:reservationList.php');

?>
