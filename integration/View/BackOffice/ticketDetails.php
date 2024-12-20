<?php
session_start();

include '../../CONTROLLER/ReservationController.php';
include '../../CONTROLLER/TicketController.php';

$reservationController = new ReservationController();
$ticketController = new TicketController();

$reservation = [];
$ticket = [];
$ticket_id = isset($_POST['ticket_id']) ? $_POST['ticket_id'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $reservation = $reservationController->getReservationByTicketId($id);
    if (is_array($reservation)) {
        $ticket = $ticketController->getTicketById($reservation['ticket_id']);
    }
}

if ($ticket_id) {
    $reservation = $reservationController->getReservationByTicketId($ticket_id);
    if (is_array($reservation)) {
        $ticket = $ticketController->getTicketById($ticket_id);
    }
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

<!-- Side Navbar -->
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
          <a class="nav-link " href="reclamationList.php">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>customer-support</title>
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
            <span class="nav-link-text ms-1">Reclamation list</span>
          </a>
        </li>
        </ul>
    </div>
    </aside>
    <!-- End Side Navbar -->
    
        <!-- Earnings (Monthly) Card Example -->
        <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
        <div class="page-header align-items-start min-vh-50 pt-3 pb-12 m-3 border-radius-lg" style="background-image: url('assets/img/curved-images/curved14.jpg');">
        <span class="mask bg-gradient-dark opacity-4"></span>
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-7 text-center mx-auto">
                <h1 class="text-white mb-2 mt-5">Tickets Details</h1>
            </div>
            <!-- ticket card -->
            <div class="card-body" style="background-color:rgba(0, 0, 0, 0.5);">
                        <div class="row">
                            <?php if (!empty($reservation)) { ?>
                                <?php foreach ($list1 as $res) { ?>
                                    <?php if ($res['ticket_id'] == $ticket['id']) { ?>
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                                            <div class="card" style="background-color:rgba(0, 0, 0, 0.5); border-radius: 15px; overflow: hidden; position: relative;">
                                                <div class="card-body">
                                                    <p class="text-white ms-auto">Name: <?php echo $res['name']; ?></p>
                                                    <p class="text-white ms-auto">Email: <?php echo $res['email']; ?></p>
                                                    <p class="text-white ms-auto">Phone: <?php echo $res['phone']; ?></p>
                                                    <p class="text-white ms-auto">Museum: <?php echo $res['musee_name']; ?></p>
                                                    <p class="text-white ms-auto">Location: <?php echo $ticket['location']; ?></p>
                                                    <p class="text-white ms-auto">Date: <?php echo $res['date']; ?></p>
                                                    <p class="text-white ms-auto">Time: <?php echo $res['time']; ?></p>
                                                    <p class="text-white ms-auto">Price: <?php echo $res['price']; ?> DT</p>
                                                    <p class="text-white ms-auto">Category: <?php echo $ticket['category']; ?></p>
                                                    <div class="d-flex justify-content-end mb-3">
                                                        <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#validerTicket">
                                                        approve
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#rejectTicket">
                                                            reject
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="col-12">
                                    <h3 class='text-center mt-4'>No Reservations for Ticket ID: <?php echo $id; ?></h3>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
            </div>
            <!-- end ticket card -->  
        </div>
        </div>
        </section>
        <!-- approve  -->
<div class="modal fade" id="validerTicket" tabindex="-1" aria-labelledby="validerTicketLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Valider Reservation</h1>
                <button type="button" class="btn-close btn-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form action="sendmail.php" method="post">
                    <div class="mb-3">
                        <label style="color: dark;" for="name"> Name:</label>
                        <input class="form-control form-control-user" type="text" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label style="color: dark;" for="surname"> Surname:</label>
                        <input class="form-control form-control-user" type="text" id="surname" name="surname">
                    </div>
                    <div class="mb-3">
                        <label for="email_address">Email</label>
                        <input type="email" class="form-control" id="email_address" name="email" >
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" >
                    </div>
                    <div class="mb-3">
                        <label for="musee_name">Musee Name</label>
                        <input class="form-control" id="musee_name" name="musee_name" ></input>
                    </div>
                    <div class="mb-3">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" >
                    </div>
                    <div class="mb-3">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time" >
                    </div>
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" >
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="approved" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end approve -->
<!-- reject -->
<div class="modal fade" id="rejectTicket" tabindex="-1" aria-labelledby="rejectTicketLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">reject Reservation</h1>
                <button type="button" class="btn-close btn-dark" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <form action="rejectMail.php" method="post">
                    <div class="mb-3">
                        <label style="color: dark;" for="name"> Name:</label>
                        <input class="form-control form-control-user" type="text" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label style="color: dark;" for="surname"> Surname:</label>
                        <input class="form-control form-control-user" type="text" id="surname" name="surname">
                    </div>
                    <div class="mb-3">
                        <label for="email_address">Email</label>
                        <input type="email" class="form-control" id="email_address" name="email" >
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" >
                    </div>
                    <div class="mb-3">
                        <label for="musee_name">Musee Name</label>
                        <input class="form-control" id="musee_name" name="musee_name" ></input>
                    </div>
                    <div class="mb-3">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" >
                    </div>
                    <div class="mb-3">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time" >
                    </div>
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" >
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="rejected" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end reject -->
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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="assets/js/core/popper.min.js"></script>
        <script src="assets/js/core/bootstrap.min.js"></script>
        <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var messageText = '<?php echo $_SESSION['status'] ?? ''; ?>';
                if(messageText != ''){
                    Swal.fire({
                    icon: 'success',
                    title: 'Thank you !',
                    text: messageText,
                });
                <?php unset($_SESSION['status']); ?>
            }
        </script>
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