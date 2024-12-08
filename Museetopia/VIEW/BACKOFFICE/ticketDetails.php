<?php
include '../../CONTROLLER/ReservationController.php';
include '../../CONTROLLER/TicketController.php';

$reservationController = new ReservationController();
$ticketController = new TicketController();

$reservation = [];
$ticket = [];
$ticket_id = isset($_POST['ticket_id']) ? $_POST['ticket_id'] : null;

if ($ticket_id) {
    $reservation = $reservationController->getReservationByTicketId($ticket_id);
    $ticket = $ticketController->getTicketById($ticket_id);
}

$list = $ticketController->listTicket();
$list1 = $reservationController->listReservation(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo-museetopia.png">
    <link rel="icon" type="image/png" href="assets/img/logo-museetopia.png">
    <title>
    Museetopia  Dashboard 
    </title>
    <!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- CSS Files -->
<link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body id="page-top">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" ../FRONTOFFICE/accueil.php ">
        <img src="assets/img/logo-museetopia.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Museetopia Dashboard </span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <di class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link  " href="ticketList.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                        <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                        </g>
                    </g>
                    </g>
                </g>
                </svg>
            </div>
            <span class="nav-link-text ms-1">Tables</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  " href="reservationList.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                        </g>
                    </g>
                    </g>
                </g>
                </svg>
            </div>
            <span class="nav-link-text ms-1">Reservation</span>
            </a>
        </li>
        <li class="nav-item"> 
        <a class="nav-link  " href="Addticket.php"> 
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"> 
            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> 
                <title>shop </title> 
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> 
                <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero"> 
                    <g transform="translate(1716.000000, 291.000000)"> 
                    <g transform="translate(0.000000, 148.000000)"> 
                        <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                        <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                        <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                    </g> 
                    </g> 
                </g> 
                </g> 
            </svg> 
            </div> 
            <span class="nav-link-text ms-1">Add Tickets</span> 
            </a> 
        </li>  
        </ul>
    </div>
    </aside>
        <!-- Earnings (Monthly) Card Example -->
        <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-3 pb-12 m-3 border-radius-lg" style="background-image: url('assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-3"></span>
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-7 text-center mx-auto">
                <h1 class="text-white mb-2 mt-5">Tickets Details</h1>
            </div>
            </div>
        </div>
        </div>
    <!-- ticket card -->
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
            <div class="col-xl-12 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-body" style="background-color:rgba(0, 0, 0, 0.1);">
                        <form id="ticketDetailsForm" action="" method="POST">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Search for ticket ID" name="ticket_id" value="<?php echo isset($ticket_id) ? $ticket_id : ''; ?>">
            </div>
          </div>
                        </form>
                        
                    <?php if (!empty($reservation)) { ?>
                        <h3 class="text-center mt-4">All Reservations for Ticket ID: <?php echo $ticket_id; ?></h3>
                        <div class="row">
                            <?php foreach ($list1 as $reservation) { ?>
                                <?php if ($reservation['ticket_id'] == $ticket_id) { ?>
                                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                                        <div class="card" style="background-color:rgba(0, 0, 0, 0.5); border-radius: 15px; overflow: hidden; position: relative;">
                                            <div class="card-body">
                                                <p class="text-white ms-auto">Name: <?php echo $reservation['name']; ?></p>
                                                <p class="text-white ms-auto">Email: <?php echo $reservation['email']; ?></p>
                                                <p class="text-white ms-auto">Phone: <?php echo $reservation['phone']; ?></p>
                                                <p class="text-white ms-auto">Museum: <?php echo $reservation['musee_name']; ?></p>
                                                <p class="text-white ms-auto">Date: <?php echo $reservation['date']; ?></p>
                                                <p class="text-white ms-auto">Time: <?php echo $reservation['time']; ?></p>
                                                <p class="text-white ms-auto">Price: <?php echo $reservation['price']; ?> DT</p>
                                                <p class="text-white ms-auto">Category: <?php echo $ticket['category']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            <?php } ?>
                        </div>
                    <?php } else{
                                    echo "<h3 class='text-center mt-4'>No Reservations for Ticket ID: $ticket_id</h3>";
                                }  ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- end ticket card -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Museetopia 2025</span>
                        </div>
                    </div>
                </footer>
                
    
            </div>
        
    
        </div>
</main>

        <script src="js/addOffer.js"></script>
    
        <!-- Bootstrap core JavaScript-->
        <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
    
    </body>

</html>