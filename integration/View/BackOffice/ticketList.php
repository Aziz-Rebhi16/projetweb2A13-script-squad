<?php
include '../../controller/TicketController.php';

//ticket-list
$ticketC = new TicketController();
$list = $ticketC->listTicket();

//add-ticket
$error = "";

$ticket= null;
// create an instance of the controller
$ticketController = new TicketController();


if (
    isset($_POST["musee_name"])  && $_POST["location"] && $_POST["date"] && $_POST["time"] && $_POST["price"]  && $_POST["category"]
) {
    if (
        !empty($_POST["musee_name"])  && !empty($_POST["location"]) && !empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["price"]) && !empty($_POST["category"])
    
    ) {
        $disponible = isset($_POST['disponible']) ? true : false;
        $ticket = new Ticket(
            null,
            $_POST['musee_name'],
            $_POST['location'],
            new DateTime($_POST['date']),
            new DateTime($_POST['time']),
            $_POST['price'],
            $disponible,
            $_POST['category']
        );
        
            
        $ticketController->addTicket($ticket);

        header('Location:ticketList.php');
    } else
        echo $error = "Missing information";
}



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

<body class="g-sidenav-show  bg-gray-100">
  <!-- Add-Ticket -->
<div class="modal fade" id="addTicket" tabindex="-1" aria-labelledby="addTicketLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Ticket</h1>
        <button type="button" class="btn-close btn-dark" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body" >
        <form id="addTicketForm" action="" method="POST">
          <label for="musee_name">Musee Name:</label><br>
          <input class="form-control form-control-user" type="text" id="musee_name" name="musee_name" >
          <span id="musee_name_error"></span><br>

          <label for="location">Location:</label><br>
          <input class="form-control form-control-user" type="text" id="location" name="location" >
          <span id="location_error"></span><br>

          <label for="date"> Date:</label><br>
          <input class="form-control form-control-user" type="date" id="date" name="date" >
          <span id="date_error"></span><br>

          <label for="time">Time:</label><br>
          <input class="form-control form-control-user" type="time" id="time" name="time" >
          <span id="time_error"></span><br>

          <label for="price">Price :</label><br>
          <input class="form-control form-control-user"  type="number" id="price" name="price" step="0.5" >
          <span id="price_error"></span><br>

          <div class="form-check form-switch">
            <input type="checkbox" class="form-check-input form-check-input-primary" id="flexSwitchCheckDefault" name="disponible">
            <label class="form-check-label" for="flexSwitchCheckDefault">Availability</label>
          </div>

          <label for="category">Category:</label><br>
          <select class="form-control form-control-user" id="category" name="category" >
              <option value=""></option>
              <option value="student">Student</option>
              <option value="child">Child</option>
              <option value="groupe">Groupe</option>
          </select>
          <br>
          <button type="submit" class="btn btn-primary btn-user btn-block" onClick="validerFormulaire()">Add </button> 
        </form>
        </div>
    </div>
  </div>
</div>
<!-- end Add-Ticket -->
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" ../FRONTOFFICE/accueil.php " target="_blank">
        <img src="assets/img/logo-museetopia.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Museetopia Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  active" href="ticketList.php">
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
            <span class="nav-link-text ms-1">Ticket</span>
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
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Tables</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-outline-primary btn-sm mb-0 me-3"  href="../pages/sign-in.html">Sign-IN</a>
              <a class="btn btn-outline-primary btn-sm mb-0 me-3"  href="../pages/sign-up.html">Sign-UP</a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
            <!-- Content Wrapper -->
<div class="container-fluid py-4">
<div id="content-wrapper" class="d-flex flex-column">
    
<!-- Main Content -->
<div id="content"> 
  <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
</nav>
<!-- End of Topbar -->
<!-- ticket table  -->
<div class="col-xl-12 col-md-6 mb-4">
  <div class="card-header pb-0 d-flex justify-content-center align-items-center">
      <h1><strong>Tickets List</strong></h1>
  </div>
  <div class="container">
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTicket">
      Add Ticket
      </button>
    </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12 col-md-10 mb-4">
      <div class="card border-left shadow h-100 py-2 ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="table-responsive">
              <table class="table table-bordered border-dark table-sm table-hover hover align-middle"> 
                <div class="d-flex justify-content-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Musee Name</th>
                      <th>Location</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Price</th>
                      <th>Availability</th>
                      <th>Category</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($list as $ticket) { ?>
                      <tr>
                        <td><?= $ticket['id']; ?></td>
                        <td><?= $ticket['musee_name']; ?></td>
                        <td><?= $ticket['location']; ?></td>
                        <td><?= $ticket['date']; ?></td>
                        <td><?= $ticket['time']; ?></td>
                        <td><?= $ticket['price']; ?> DT</td>
                        <td><?= $ticket['disponible'] ? "yes" : "no"; ?></td>
                        <td><?= $ticket['category']; ?></td>
                        <td class="btn-group-vertical " role="group">
                          <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"></button>
                          <ul class="dropdown-menu">
                          <form method="POST" action="updateTicket.php">
                            <input class="btn btn-outline-primary w-100 mb-1" type="submit" name="update" value="Update">
                            <input type="hidden" value=<?PHP echo $ticket['id']; ?> name="id">
                          </form>
                            <li><a class="btn btn-outline-danger w-100 mb-1" href="deleteTicket.php?id=<?php echo $ticket['id']; ?>">Delete</a></li>
                            <li><a class="btn btn-outline-dark w-100 mb-1" href="ticketDetails.php?id=<?php echo $ticket['id']; ?>">Details</a></li>
                          </ul>
                        </td>
                      </tr>
                    <?php }?>
                  </tbody>
                </div>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- end ticket table  -->
<!-- footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Museetopia 2025</span>
        </div>
    </div>
</footer>


        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script src="js/addOffer.js"></script>
<!--   Core JS Files   -->
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
