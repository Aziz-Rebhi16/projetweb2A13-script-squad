<?php
include '../../controller/TicketController.php';

$ticketC = new TicketController();
$ticketC->deleteTicket($_GET["id"]);
header('Location:ticketList.php');

?>
