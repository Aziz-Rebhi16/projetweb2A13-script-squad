<?php
// Inclure le contrôleur pour récupérer la liste des régions
include '../../controller/RegionController.php';

// Instancier le contrôleur des régions
$regionController = new RegionController();

// Récupérer la liste des régions pour le front-office
$listeRegions = $regionController->listRegions();       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List of Regions - Museum Booking</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>

    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="accueil.php">Home</a></li>
            <li><a href="regionListFront.php">Regions List</a></li>
        </ul>
    </nav>

    <header>
        <h1>Welcome to Museum Booking</h1>
    </header>

    <section>
        <h2>List of Regions</h2>
        <div class="region-list">
            <?php
            // Vérifier si des régions sont disponibles
            if ($listeRegions) {
                foreach ($listeRegions as $region) {
            ?>
                    <div class="region-item">
                        <h3><?php echo $region['nom']; ?></h3>
                        <p><strong>Description:</strong> <?php echo $region['description']; ?></p>
                        <p><strong>Image:</strong> <img src="../../assets/img/<?php echo $region['image']; ?>" alt="Region Image" width="100" /></p>
                    </div>
            <?php
                }
            } else {
                echo "<p>No regions available at the moment.</p>"; 
            }
            ?>
        </div>
    </section> 

    <footer>
        <p>&copy; 2024 Museum Booking</p>
    </footer>

</body>
</html>
