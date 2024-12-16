<?php

include '../../CONTROLLER/ReservationController.php';
include '../../CONTROLLER/TicketController.php';

$error = "";
$reservation = null;
$ticket = null;
$ticket_id = isset($_GET['ticket_id']) ? $_GET['ticket_id'] : null;

if ($ticket_id) {
    $ticketController = new TicketController();
    $ticket = $ticketController->getTicketById($ticket_id);
}

// create an instance of the controller
$ReservationController = new ReservationController();

if (
    isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["musee_name"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["price"]) && isset($_POST["category"])
) {
    if (
        !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["musee_name"]) && !empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["price"]) && !empty($_POST["category"])
    ) {
        $reservation = new reservation(
            null,
            $_POST['name'],
            $_POST['surname'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['musee_name'],
            new DateTime($_POST['date']),
            new DateTime($_POST['time']),
            $_POST['price'],
            $_POST['category'],
            $ticket_id
        );

        $ReservationController->addReservation($reservation);

        header('Location:accueil.php#section_3');
    } else {
        echo $error = "Missing information";
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo-museetopia.png">
        <link rel="icon" type="image/png" href="assets/images/logo-museetopia.png">

        <title>Museetopia - HTML Reservation Form</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">
            
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <link href="assets/css/bootstrap-icons.css" rel="stylesheet">

        <link href="assets/css/vegas.min.css" rel="stylesheet">

        <link href="assets/css/tooplate-barista.css" rel="stylesheet">


    </head>
    
    <body id="page-top">
                
<main>
<nav class="navbar navbar-expand-lg">                
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="accueil.php">
            <img src="assets\images\logo-museetopia.png" class="navbar-brand-image img-fluid" alt="Barista Cafe Template">
            Museetopia
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
            <span class="assets/navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="accueil.php#section_1">Home</a>
                </li>
        
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="accueil.php#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="accueil.php#section_3">Our Tickets</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="accueil.php#section_4">Reviews</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="accueil.php#section_5">Contact</a>
                </li>
            </ul>

            <div class="ms-lg-3">
                <a class="btn custom-btn custom-border-btn" href="../BACKOFFICE/ticketList.php">
                    Dashboard
                    <i class="bi-arrow-up-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<section class="booking-section section-padding">
<div class="container">
    <div class="row ">
        <div class="col-lg-8  mx-auto">
            <div class="booking-form-wrap">
                <div class="row">
                        <form class="custom-form booking-form" id="addReservationForm" action="" method="post" >
                            <div class="text-center mb-0 pb-lg-0 pb-0">
                                <em class="text-white">Fill out the booking form</em>

                            <h2 class="text-white">BOOK A DATE </h2>
                                            </div>

                            <div class="booking-form-body">
                                <div class="rows">
                                <label style="color: white;" for="name">Name:</label><br>
                                <input class="form-control form-control-user" type="text" id="name" name="name" ><br>
                                <label style="color: white;" for="surname">Surname:</label><br>
                                <input class="form-control form-control-user" type="text" id="surname" name="surname"><br>
                                <label style="color: white;" for="email">Email:</label><br>
                                <input class="form-control form-control-user" type="email" id="email" name="email"><br>
                                <label style="color: white;" for="phone">Phone:</label><br>
                                <input class="form-control form-control-user" type="tel" id="phone" name="phone"><br>
                                <label style="color: white;" for="musee_name">Musee Name:</label><br>
                                <input class="form-control form-control-user" type="text" readonly id="musee_name" name="musee_name" value="<?php echo $ticket ? $ticket['musee_name'] : ''; ?>"><br>
                                <label style="color: white;" for="date"> Date:</label><br>
                                <input class="form-control form-control-user" type="date" readonly id="date" name="date" value="<?php echo $ticket ? $ticket['date'] : ''; ?>"><br>
                                <label style="color: white;" for="time">Time:</label><br>
                                <input class="form-control form-control-user white" readonly type="time" id="time" name="time" value="<?php echo $ticket ? $ticket['time'] : ''; ?>"><br>
                                <label style="color: white;" for="price">Price :</label><br>
                                <input class="form-control form-control-user"  readonly type="number" id="price" name="price" step="0.5" value="<?php echo $ticket ? $ticket['price'] : ''; ?>"><br>
                                <label style="color: white;" for="category">Category:</label><br>
                                <select class="form-control form-control-user" id="category" name="category">
                                    <option value=" "></option>
                                    <option value="student" <?php echo $ticket && $ticket['category'] == 'student' ? 'selected' : ''; ?>>Student</option>
                                    <option value="child" <?php echo $ticket && $ticket['category'] == 'child' ? 'selected' : ''; ?>>Child</option>
                                    <option value="groupe" <?php echo $ticket && $ticket['category'] == 'groupe' ? 'selected' : ''; ?>>Groupe</option>
                                </select><br>
                                <button type="submit" 
                                
                                class="btn btn-primary btn-user btn-block" 
                                onClick="validerFormulaire() "
                                >Submit</button> 
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>


                <footer class="site-footer">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-12 me-auto">
                                <em class="text-white d-block mb-4">Where to find us?</em>

                                <strong class="text-white">
                                    <i class="bi-geo-alt me-2"></i>
                                    ESPRIT BLOC E
                                </strong>

                                <ul class="social-icon mt-4">
                                    <li class="social-icon-item">
                                        <a href="https://www.facebook.com/profile.php?id=100009109830044" class="social-icon-link bi-facebook" target="_blank">
                                        </a>
                                    </li>
        
                                    <li class="social-icon-item">
                                        <a href="https://x.com/AZIZREBHI7?t=MSXCNGKgc3h1UsyUsoKCkQ&s=09" target="_blank" class="social-icon-link bi-twitter">
                                        </a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="https://www.instagram.com/rebhiaziz/?hl=fr" class="social-icon-link bi-instagram" target="_blank">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-12 mt-4 mb-3 mt-lg-0 mb-lg-0">
                                <em class="text-white d-block mb-4">Contact</em>

                                <p class="d-flex mb-1">
                                    <strong class="me-2">Phone:</strong>
                                    <a href="tel: 35-240-967" class="site-footer-link">
                                        (+216) 
                                        27 571 808
                                    </a>
                                </p>

                                <p class="d-flex">
                                    <strong class="me-2">Email:</strong>

                                    <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                        aziz.rebhi@esprit.tn
                                    </a>
                                </p>
                            </div>


                            <div class="col-lg-5 col-12">
                                <em class="text-white d-block mb-4">Opening Hours.</em>

                                <ul class="opening-hours-list">
                                    <li class="d-flex">
                                        Monday - Friday
                                        <span class="underline"></span>

                                        <strong>9:00 - 18:00</strong>
                                    </li>

                                    <li class="d-flex">
                                        Saturday
                                        <span class="underline"></span>

                                        <strong>11:00 - 16:30</strong>
                                    </li>

                                    <li class="d-flex">
                                        Sunday
                                        <span class="underline"></span>

                                        <strong>Closed</strong>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-8 col-12 mt-4">
                                <p class="copyright-text mb-0">Copyright © MUSEETOPIA 2025
                                    - Design: SCRIPT SQUAD</p>
                            </div>

                    </div>
                </footer>
            </main>


        <!-- JAVASCRIPT FILES -->
         <script src="assets/js/addReservation.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.sticky.js"></script>
        <script src="assets/js/vegas.min.js"></script>
        <script src="assets/js/custom.js"></script>

    </body>
</html>