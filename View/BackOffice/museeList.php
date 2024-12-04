<?php
include '../../controller/MuseeController.php';

// Instancier le contrôleur des musées
$museeController = new MuseeController();

// Récupérer la liste des musées
$listeMusees = $museeController->listMusees();   
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>List of Museums - Dashboard</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    
       <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">Museum Management</div>
    </a>
    <hr class="sidebar-divider my-0">

    <!-- Lien vers la liste des musées -->
    <li class="nav-item active">
        <a class="nav-link" href="museeList.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Museum List</span>
        </a>
    </li>

    <!-- Lien vers l'ajout de musée -->
    <li class="nav-item">
        <a class="nav-link" href="addMusee.php">
            <i class="fas fa-fw fa-plus"></i>
            <span>Add Museum</span>
        </a>
    </li>

    <!-- Lien vers la liste des régions -->
    <li class="nav-item">
        <a class="nav-link" href="regionList.php">
            <i class="fas fa-fw fa-map-marker-alt"></i>
            <span>Region List</span>
        </a>
    </li>

    <!-- Lien vers l'ajout de région -->
    <li class="nav-item">
        <a class="nav-link" href="addRegion.php">
            <i class="fas fa-fw fa-plus-circle"></i>
            <span>Add Region</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
    
            <!-- Main Content -->
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>

                <!-- Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-0 text-gray-800">List of Museums</h1>

                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Region_id</th>
                                                <th>Closed Days</th>
                                                <th>Creation Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($musee = $listeMusees->fetch()) {
                                                echo '<tr>';
                                                echo '<td>' . $musee['id'] . '</td>';
                                                echo '<td>' . $musee['nom'] . '</td>';
                                                echo '<td>' . $musee['adresse'] . '</td>';
                                                echo '<td>' . $musee['region_id'] . '</td>';
                                                echo '<td>' . $musee['jours_fermeture'] . '</td>';
                                                echo '<td>' . $musee['date_creation'] . '</td>';
                                                echo '<td>
                                                        <a href="updateMusee.php?id=' . $musee['id'] . '" class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="deleteMusee.php?id=' . $musee['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this museum?\')">Delete</a>
                                                      </td>';
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
