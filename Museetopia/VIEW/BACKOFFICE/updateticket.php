<?php

include '../../controller/TicketController.php';


$error = "";

$ticket= null;
// create an instance of the controller
$ticketController = new TicketController();


if (
    isset($_POST["musee_name"]) && isset($_POST["location"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["price"]) && isset($_POST["category"])
) {
    if (
        !empty($_POST["musee_name"]) && !empty($_POST["location"]) && !empty($_POST["date"]) && !empty($_POST["time"]) && !empty($_POST["price"]) && !empty($_POST["category"])
    ) {
        $disponible = isset($_POST['disponible']) ? true : false;   
        $ticket = new ticket(
            null,
            $_POST['musee_name'],
            $_POST['location'],
            new DateTime($_POST['date']),
            new DateTime($_POST['time']),
            $_POST['price'],
            $disponible,
            $_POST['category']
        );
        
        $ticketController->updateTicket($ticket, $_POST['id']);

        header('Location:ticketList.php');
    } else {
        $error = "Missing information";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>Update Ticket - Dashboard</title>
    
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
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
                        <span>Back to ticket List</span></a>
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
                            <h1 class="h3 mb-0 text-gray-800">Update the ticket with Id = <?php echo $_POST['id'] ?> </h1>
                                </div>
    
                        <!-- Content Row -->
                        <div class="row">
    
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                        <?php
    if (isset($_POST['id'])) {
        $ticket = $ticketController->showticket($_POST['id']);
    ?>
                                            <form id="addTicketForm" action="" method="POST">
                                            <label for="id">ID Ticket:</label><br>
                                            <input class="form-control form-control-user" type="text" id="id" name="id" readonly value="<?php echo $_POST['id'] ?>">
                                                <label for="musee_name">Musee Name:</label><br>
                                                <input class="form-control form-control-user" type="text" id="musee_name" name="musee_name" value="<?php echo $ticket['musee_name'] ?>" >
                                                <span id="musee_name_error"></span><br>
                                            
                                        
                                                <label for="location">Location:</label><br>
                                                <input class="form-control form-control-user" type="text" id="location" name="location" value="<?php echo $ticket['location'] ?>" >
                                                <span id="location_error"></span><br>
                                        
                                                <label for="date">Date:</label><br>
                                                <input class="form-control form-control-user" type="date" id="date" name="date" value="<?php echo $ticket['date'] ?>" >
                                                <span id="date_error"></span><br>
                                        
                                                <label for="time">Time:</label><br>
                                                <input class="form-control form-control-user" type="time" id="time" name="time" value="<?php echo $ticket['time'] ?>">
                                                <span id="time_error"></span><br>
                                        
                                                <label for="price">Price :</label><br>
                                                <input class="form-control form-control-user"  type="number" id="price" name="price" step="0.5" value="<?php echo $ticket['price'] ?>">
                                                <span id="price_error"></span><br>
                                        
                                                
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox small">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="disponible"  <?php echo (isset($ticket['disponible']) && $ticket['disponible'] == 1) ? 'checked' : ''; ?> >
                                                        <label class="custom-control-label" for="customCheck">Availability
                                                            </label>
                                                    </div>
                                                </div>
                                                <label for="category">Category:</label><br>
                                                <select class="form-control form-control-user" type="text" id="category" name="category" value="<?php echo $ticket['category'] ?>">
                                                    <option value="student">Student</option>
                                                    <option value="child">Child</option>
                                                    <option value="groupe">Groupe</option>
                                                    
                                                </select>
                                            <br>
                                        
                                                <button type="submit" 
                                                class="btn btn-primary btn-user btn-block" 
                                                onClick="validerFormulaire()"
                                                >Update Ticket</button> 
                                                <!-- <button type="submit" 
                                                class="btn btn-primary btn-user btn-block" 
                                                
                                                >Add Offer</button> -->
                                            </form>
                                            <?php
    }
    ?>
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
        
        
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
        <script src="js/addOffer.js"></script>
    
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    

    
    </body>

</html>
