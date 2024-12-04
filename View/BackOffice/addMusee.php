<?php

include '../../controller/MuseeController.php';
include_once '../../model/Musee.php'; // Assurez-vous que la classe Musee est incluse correctement 

$error = ""; 

$musee = null;
// create an instance of the controller
$museeController = new MuseeController();   

if (
    isset($_POST["nom"]) && isset($_POST["adresse"]) && isset($_POST["region_id"]) && isset($_POST["description"]) &&
    isset($_POST["jours_fermeture"]) && isset($_POST["date_creation"])
) {
    if (
        !empty($_POST["nom"]) && !empty($_POST["adresse"]) && !empty($_POST["region_id"]) && !empty($_POST["description"]) &&
        !empty($_POST["jours_fermeture"]) && !empty($_POST["date_creation"])
    ) {
        $musee = new Musee(
            null, 
            $_POST['nom'],
            $_POST['adresse'],
            $_POST['region_id'],
            $_POST['description'],
            $_POST['jours_fermeture'],
            new DateTime($_POST['date_creation'])
        );

        $museeController->addMusee($musee);

        // Rediriger après l'ajout
        header('Location: museeList.php');
        exit(); // Assurez-vous que le script s'arrête après la redirection
    } else {
        $error = "Informations manquantes";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ajouter un Musée - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Gestion des Musées</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="museeList.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Liste des Musées</span>
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ajouter un Musée</h1>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <?php if (!empty($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

                                    <form id="addMuseeForm" action="" method="POST">
                                        <label for="nom">Nom :</label><br>
                                        <input class="form-control form-control-user" type="text" id="nom" name="nom">
                                        <br>

                                        <label for="adresse">Adresse :</label><br>
                                        <input class="form-control form-control-user" type="text" id="adresse"
                                            name="adresse">
                                        <br>

                                        <label for="region_id">Région :</label><br>
                                        <select class="form-control form-control-user" id="region_id" name="region_id">
                                            <!-- Ajoutez ici vos options pour les régions -->
                                            <option value="1">Région 1</option>
                                            <option value="2">Région 2</option>
                                        </select>
                                        <br>

                                        <label for="description">Description :</label><br>
                                        <textarea class="form-control form-control-user" id="description"
                                            name="description"></textarea>
                                        <br>

                                        <label for="jours_fermeture">Jours de fermeture :</label><br>
                                        <input class="form-control form-control-user" type="text" id="jours_fermeture"
                                            name="jours_fermeture" placeholder="Ex : Lundi, Dimanche">
                                        <br>

                                        <label for="date_creation">Date de création :</label><br>
                                        <input class="form-control form-control-user" type="date" id="date_creation"
                                            name="date_creation">
                                        <br>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">Ajouter Musée</button>
                                    </form>

                                    <!-- Bouton de retour à la liste des musées -->
                                    <a href="museeList.php" class="btn btn-secondary btn-user btn-block mt-3">Retour à la liste des musées</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Gestion des Musées 2024</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
