<?php
// Inclure le contrôleur pour récupérer la liste des musées
include '../../controller/MuseeController.php';

// Instancier le contrôleur des musées
$museeController = new MuseeController();

// Récupérer la liste des musées pour le front-office
$listeMusees = $museeController->listMusees();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>List of Museums - Museum Booking</title>
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>

    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="accueil.php">Home</a></li>
            <li><a href="museeListFront.php">Museums List</a></li>
        </ul>
    </nav>

    <header>
        <h1>Welcome to Museum Booking</h1>
    </header>

    <section>
        <h2>List of Museums</h2>
        <div class="museum-list">
            <?php
            // Vérifier si des musées sont disponibles
            if ($listeMusees->rowCount() > 0) {
                while ($musee = $listeMusees->fetch()) {
            ?>
                    <div class="museum-item">
                        <h3><?php echo $musee['nom']; ?></h3>
                        <p><strong>Address:</strong> <?php echo $musee['adresse']; ?></p>
                        <p><strong>Region:</strong> <?php echo $musee['region']; ?></p>
                        <p><strong>Closed Day:</strong> <?php echo $musee['jours_fermeture']; ?></p>
                        <p><strong>Creation Date:</strong> <?php echo $musee['date_creation']; ?></p>
                    </div>
            <?php
                }
            } else {
                echo "<p>No museums available at the moment.</p>";
            }
            ?>
        </div>
    </section> 

    <footer>
        <p>&copy; 2024 Museum Booking</p>
    </footer>

</body>
</html>
