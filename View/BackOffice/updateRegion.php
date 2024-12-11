<?php

include '../../controller/RegionController.php';

// Initialisation
$error = "";
$region = null;

// Instancier le contrôleur
$regionController = new RegionController();

if (isset($_GET['id'])) {
    // Récupérer les informations de la région à modifier
    $region = $regionController->showRegion($_GET['id']);
    if (!$region) {
        $error = "Region not found.";
    }
}

// Vérification du formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'], $_POST['nom'], $_POST['description'])) {
        if (!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['description'])) {
            // Gestion de l'image
            $image = $region['image']; // Utiliser l'image actuelle par défaut
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $target_dir = __DIR__ . '/assets/img/';
                $target_file = $target_dir . basename($_FILES['image']['name']);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_types = ['jpg', 'jpeg', 'png'];

                // Vérifier les types de fichiers autorisés
                if (in_array($imageFileType, $allowed_types)) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                        $image = "uploads/" . basename($_FILES['image']['name']); // Nouveau chemin de l'image
                    } else {
                        $error = "Failed to upload the image.";
                    }
                } else {
                    $error = "Only JPG, JPEG, and PNG files are allowed.";
                }
            }

            if (empty($error)) {
                // Mettre à jour la région
                $updatedRegion = new Region($_POST['id'], $_POST['nom'], $_POST['description'], $image);
                $regionController->updateRegion($updatedRegion, $_POST['id']);
                header('Location: regionList.php');
                exit();
            }
        } else {
            $error = "All fields are required.";
        }
    } else {
        $error = "Invalid form submission.";
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
    <title>Update Region</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">

<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-text mx-3">Region Management</div>
        </a>
        <li class="nav-item">
            <a class="nav-link" href="regionList.php">
                <i class="fas fa-fw fa-list"></i>
                <span>Back to Region List</span>
            </a>
        </li>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <h1 class="h3 mb-4 text-gray-800">Update Region</h1>

                <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <?php if ($region): ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id">Region ID</label>
                            <input type="text" class="form-control" id="id" name="id" value="<?= htmlspecialchars($region['id']) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nom">Name</label>
                            <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($region['nom']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required><?= htmlspecialchars($region['description']) ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <small>Current Image:</small>
                            <img src="<?= htmlspecialchars($region['image']) ?>" alt="Region Image" style="max-width: 150px; display: block; margin-top: 10px;">
                            <input type="hidden" name="current_image" value="<?= htmlspecialchars($region['image']) ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="regionList.php" class="btn btn-secondary">Cancel</a>
                    </form>
                <?php else: ?>
                    <p>Region not found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>
