
<?php
include '../../controller/MuseeController.php';

// Crée une instance du contrôleur MuseeController
$museeController = new MuseeController();
$listMusees = $museeController->listMusees(); // Récupère la liste des musées

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Accueil - MUSEETOPIA</title> 
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top"> 
    <!-- Navbar -->  
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">
                <img src="assets/img/logo.png"  width="25%" height="25%" />
            </a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="./../BackOffice/museeList.php">Dashboard</a></li>
                    <!-- Bouton pour la liste des musées dans le FrontOffice -->
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded" href="museeListFront.php">Museum List</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  

    <!-- Header --> 
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <h1 class="masthead-heading text-uppercase mb-0">MUSEETOPIA</h1>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><img src="assets/img/museum-icon.png" alt="Museum Icon" width="50" height="50"></div>
                <div class="divider-custom-line"></div>
            </div>
            <p class="masthead-subheading font-weight-light mb-0">Explore Historical and Cultural Heritage - Book Your Museum Visits</p>
        </div>
    </header> 

    <!-- Section Museum Offers -->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
        <img src="assets/img/museum.jpg" width="30%" height="30%" />
            
            <div class="row justify-content-center">
                <?php
                foreach ($listMusees as $musee) { 
                ?>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <img class="img-fluid" src="assets/img/musee.jpg"  />
                        </div>
                        <div class="portfolio-caption text-center">
                            <h4><?php echo $musee['nom']; ?></h4>
                            <p class="text-muted"><?php echo $musee['region']; ?></p>
                            <p class="text-muted">Closed Day: <?php echo $musee['jours_fermeture']; ?></p> 
                        </div>
                    </div>
                <?php 
                }
                ?>  
            </div>
        </div>
    </section>

    <!-- Section About -->
    <section class="page-section" id="about">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">About</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><img src="assets/img/museum-icon.png" alt="Museum Icon" width="50" height="50"></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center">
                <p align="center">Discover and book museum visits easily through our platform. We provide a wide variety of museums across different regions. Explore art, history, and culture all in one place!</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <p>You can contact us at: <a href="mailto:contact@museum.tn">contact@museum.tn</a></p>
                    <p>TUNISIA</p>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Your Website 2024</small></div>
    </div>
</body>
</html>
