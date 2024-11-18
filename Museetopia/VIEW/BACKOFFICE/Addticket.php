<?php
include '../../CONTROLLER/MuseetopiaController.php';

use museetopia\MuseetopiaController;

$error = "";
$add = null;
$addController = new MuseetopiaController();

function validerFormulaire() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Form submitted successfully!";
        if (isset($_POST['musee_name']) && isset($_POST['location']) && isset($_POST['time']) && isset($_POST['date']) && isset($_POST['price']) && isset($_POST['ticket_type']) && isset($_POST['disponible'])) {
            $musee_name = $_POST['musee_name'];
            $location = $_POST['location'];
            $time = $_POST['time'];
            $date = $_POST['date'];
            $price = $_POST['price'];
            $ticket_type = $_POST['ticket_type'];
            $disponible = isset($_POST['disponible']) ? true : false;
            $add = new ticket(null, $musee_name, $location, $time, $date, $ticket_type, $disponible, $price);

            global $addController;
            $addController->addticket($add);
            header('Location: ticketList.php');
            exit(); // Ensure no further code is executed after redirect
        } else {
            global $error;
            $error = "Missing information";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="eg">
<>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit = no">
    <meta name="description" content="Add ticket">
    <meta name="author" content="Museetopia">

    <title>Add ticket-dashboard</title>
    
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

            <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    
</head>
<body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
    
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    
                    <div class="sidebar-brand-text mx-3">Museetopia <sup></sup></div>
                </a>
    
                <!-- Divider -->
                <hr class="sidebar-divider my-0">
    
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
    
                <li class="nav-item active">
                    <a class="nav-link" href="ticketList.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>ticket List</span></a>
                </li>
    
    
            </ul>
            <!-- End of Sidebar -->
    
            <!-- Content Wrapper -->
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
    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
    
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Add a ticket</h1>
                                  </div>
    
                        <!-- Content Row -->
                        <div class="row">
    
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            
                                            <form id="addTicketForm" action="" method="POST">
                                                <label for="musee_name">musee_name:</label><br>
                                                <input class="form-control form-control-user" type="text" id="musee_name" name="musee_name" >
                                                <span id="musee_name_error"></span><br>
                                             
                                        
                                                <label for="location">location:</label><br>
                                                <input class="form-control form-control-user" type="text" id="location" name="location" >
                                                <span id="location_error"></span><br>
                                        
                                                <label for="time">time:</label><br>
                                                <input class="form-control form-control-user" type="time" id="time" name="time" >
                                                <span id="time_error"></span><br>
                                        
                                                <label for="date"> Date:</label><br>
                                                <input class="form-control form-control-user" type="date" id="date" name="date" >
                                                <span id="date_error"></span><br>
                                        
                                                <label for="price">Price :</label><br>
                                                <input class="form-control form-control-user"  type="number" id="price" name="price" step="0.01" >
                                                <span id="price_error"></span><br>
                                        
                                                
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="disponible">
                                                        <label class="custom-control-label" for="customCheck">Availability
                                                            </label>
                                                    </div>
                                                </div>
                                                <label for="ticket_type">ticket_type:</label><br>
                                                <select class="form-control form-control-user" id="ticket_type" name="ticket_type" >
                                                    <option value="student">student</option>
                                                    <option value="child">child</option>
                                                    <option value="group">group</option>
                                                    
                                                </select>
                                           <br>
                                        
                                           <button type="submit" 
                                           class="btn btn-primary btn-user btn-block" 
                                           name="submit" 
                                           onclick="alert('Submit button clicked')">Add Ticket</button>

                                                <!-- <button type="submit" 
                                                class="btn btn-primary btn-user btn-block" 
                                                
                                                >Add ticket</button> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                          
                        </div>
    
                      
    
                    </div>
                   
    
                </div>
               
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Museetopia 2025</span>
                        </div>
                    </div>
                </footer>
              
    
            </div>
         
    
        </div>
       
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script src="js/addticket.js"></script>
    
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    
        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>
    
        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
    
    </body>

</html>