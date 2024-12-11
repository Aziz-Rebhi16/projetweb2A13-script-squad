<?php
// Inclure les fichiers nécessaires
include '../../controller/RegionController.php';
include_once '../../model/Region.php'; // Assurez-vous que ce fichier existe

// Initialisation des variables
$error = "";
$region = null;

// Instancier le contrôleur
$regionController = new RegionController();    

if (isset($_POST["nom"]) && isset($_POST["description"]) && isset($_FILES["image"])) {
    if (!empty($_POST["nom"]) && !empty($_POST["description"]) && !empty($_FILES["image"]["name"])) {
        // Gestion du téléchargement de l'image
        $target_dir = __DIR__ . '/assets/img/';
        if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);  
    }

    $target_file = $target_dir . '/' . basename($_FILES["image"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifier le type de fichier
        $allowed_types = ['jpg', 'jpeg', 'png'];
        if (!in_array($imageFileType, $allowed_types)) {
            $error = "Seuls les fichiers JPG, JPEG, PNG sont autorisés.";
        } else {
            // Déplacer le fichier vers le dossier cible
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Création de l'objet région
                $region = new Region(
                    null,
                    htmlspecialchars($_POST['nom']),
                    htmlspecialchars($_POST['description']),
                    $target_file
                );

                // Ajouter la région via le contrôleur
                if ($regionController->addRegion($region)) {
                    // Rediriger vers la liste des régions si succès
                    header('Location: regionList.php');
                    exit;
                } 
            } else {
                $error = "Erreur lors du téléchargement de l'image.";
            }
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
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

    <title>Ajouter une Région</title>

    <!-- Custom fonts and styles -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-text mx-3">Gestion des Régions</div>
            </a>
            <li class="nav-item">
                <a class="nav-link" href="regionList.php">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Liste des Régions</span>
                </a>
            </li>
        </ul>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>

                <div class="container-fluid">
                    <h1 class="h3 mb-0 text-gray-800">Ajouter une Région</h1>

                    <?php if ($error): ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" name="nom" id="nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image :</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a href="regionList.php" class="btn btn-secondary">Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
