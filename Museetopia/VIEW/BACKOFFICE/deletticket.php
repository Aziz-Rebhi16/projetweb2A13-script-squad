<?php
include '../../controller/MuseetopiaController.php';
use museetopia\MuseetopiaController;
$MuseetopiaC = new MuseetopiaController();
$MuseetopiaC->deleteticket($_GET["id"]);
header('Location:ticketList.php');
