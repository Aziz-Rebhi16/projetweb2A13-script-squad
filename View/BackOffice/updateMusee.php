<?php

include '../../controller/MuseeController.php';

$error = "";
$musee = null;
// Create an instance of the controller 
$museeController = new MuseeController();   


if (
    isset($_POST["id"], $_POST["nom"], $_POST["adresse"], $_POST["region"], $_POST["jours_fermeture"], $_POST["description"], $_POST["date_creation"])
) {
    if (
        !empty($_POST["id"]) && !empty($_POST["nom"]) && !empty($_POST["adresse"]) &&
        !empty($_POST["region"]) && !empty($_POST["jours_fermeture"]) &&
        !empty($_POST["description"]) && !empty($_POST["date_creation"])
    ) {
        $musee = new Musee(
            $_POST['id'], 
            $_POST['nom'],
            $_POST['adresse'],
            $_POST['region'],
            $_POST['jours_fermeture'],
            $_POST['description'],
            new DateTime($_POST['date_creation'])
        );
        
        // Update the museum
        $museeController->updateMusee($musee, $_POST['id']);
        header('Location: museeList.php');
        exit();
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

        <title>Update Museum - Dashboard</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-text mx-3">Museum Booking</div>
                </a>
                <hr class="sidebar-divider my-0">
                <li class="nav-item active">
                    <a class="nav-link" href="museeList.php">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Back to Museum List</span></a>
                </li>
            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <div class="container-fluid">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Update Museum</h1>
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <?php
                                            if (isset($_GET['id'])) {
                                                $musee = $museeController->showMusee($_GET['id']);
                                                if ($musee) {
                                            ?>
                                                <form action="" method="POST">
                                                    <label for="id">Museum ID:</label><br>
                                                    <input class="form-control" type="text" id="id" name="id" readonly value="<?php echo htmlspecialchars($musee['id']); ?>">

                                                    <label for="nom">Name:</label><br>
                                                    <input class="form-control" type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($musee['nom']); ?>" required>

                                                    <label for="adresse">Address:</label><br>
                                                    <input class="form-control" type="text" id="adresse" name="adresse" value="<?php echo htmlspecialchars($musee['adresse']); ?>" required>

                                                    <label for="region">Region:</label><br>
                                                    <input class="form-control" type="text" id="region" name="region" value="<?php echo htmlspecialchars($musee['region']); ?>" required>

                                                    <label for="jours_fermeture">Days Closed:</label><br>
                                                    <input class="form-control" type="text" id="jours_fermeture" name="jours_fermeture" value="<?php echo htmlspecialchars($musee['jours_fermeture']); ?>" required>

                                                    <label for="description">Description:</label><br>
                                                    <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($musee['description']); ?></textarea>

                                                    <label for="date_creation">Creation Date:</label><br>
                                                    <input class="form-control" type="date" id="date_creation" name="date_creation" value="<?php echo htmlspecialchars($musee['date_creation']); ?>" required>

                                                    <button type="submit" class="btn btn-primary mt-3">Update Museum</button>
                                                </form>
                                            <?php
                                                } else {
                                                    echo "<p>Museum not found.</p>";
                                                }
                                            } else {
                                                echo "<p>No ID provided.</p>";
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
                            <span>Copyright &copy; Museum Booking 2024</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>
