<?php

include 'C:/xampp/htdocs/Reclamation/Controller/reclamationController.php';

$error = "";

$reclamation = null;
$reclamationController = new reclamationController();

if (
    isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["sujet"]) && isset($_POST["description"])
) {
    if (
        !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["sujet"]) && !empty($_POST["description"])
    ) {
        
        $status = isset($_POST['status']) ? $_POST['status'] : 'En cours';
        $id_rec=$_GET['id_rec'];

        
        $reclamation = new Reclamation(
            null, 
            $_POST['nom'],
            $_POST['prenom'],
            null,
            $_POST['sujet'],
            $status,  
            $_POST['description']
        );

         

        $reclamationController->update_rec($reclamation,$id_rec);

    
            


        
        header('Location: ../../View/Backoffice/pages/tables.php');
        exit();  
    } else {
      
        $error = "Missing information. Please fill in all required fields.";
    }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>MuséeTopia - Réclamation</title>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">
            
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/vegas.min.css" rel="stylesheet">

        <link href="css/tooplate-barista.css" rel="stylesheet">
    </head>
    
    <body class="reservation-page">
                
            <main>
                <nav class="navbar navbar-expand-lg">                
                    <div class="container">
                        <a class="navbar-brand d-flex align-items-center" href="index.html">
                            <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="">
                            MuséeTopia
                        </a>
        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-lg-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html#section_1">Acceuil</a>
                                </li>
        
                                <li class="nav-item">
                                    <a class="nav-link" href="index.html#section_2">A propos</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html#section_3">Explorer</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html#section_4">reservation</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="index.html#section_5">Contact</a>
                                </li>
                            </ul>

                            <div class="ms-lg-3">
                                <a class="btn custom-btn custom-border-btn" href="reservation.html">
                                    Reclamation
                                    <i class="bi-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
                

                <section class="booking-section section-padding">
                    <div class="container">
                        <div class="row justify-content-center align-items-center" style="height: 100vh;">
                            <div class="col-lg-10 col-md-12 col-sm-14">
                                <div class="booking-form-wrap">
                                <?php
    if (isset($_GET['id_rec'])) {
        $reclamation = $reclamationController->show_rec($_GET['id_rec']);

        $sujetOptions = [
            -1 => 'N/A',
            0 => 'Difficultés de réservation : Problèmes de paiement, réservations non confirmées.',
            1 => 'Problèmes techniques : Lenteur du site, bugs pendant l'.'utilisation.',
            2 => 'Informations incorrectes : Horaires, tarifs ou événements mal affichés.',
            3 => 'Délai de traitement des réclamations : Réponses tardives aux réclamations.',
            4 => 'Plusieurs ou autre(s).'
          ];
          $sujet=isset($reclamation['sujet']) && isset($sujetOptions[$reclamation['sujet']]) 
              ? $sujetOptions[$reclamation['sujet']] 
              : 'N/A';
    
       
    ?>
                                    <form id="formReclamation" class="booking-form text-white" action="" method="POST">
                                        <div class="text-center mb-4">
                                            <h2 class="text-white">Formulaire de réclamation</h2>
                                        </div>
                                        <div class="booking-form-body row">
                                            <div class="col-lg-12">
                                                <label for="nom">Nom :</label>
                                                <input type="text" id="nom" name="nom" class="form-control" value=<?php echo $reclamation['nom']?>>
                                            </div>
                                            <p id="errnom"></p>
                                            <div class="col-lg-12">
                                                <label for="text">prenom:</label>
                                                <input type="text" id="prenom" name="prenom" class="form-control" value=<?php echo $reclamation['prenom']?>>
                                            </div>
                                            <p id="errprenom"></p>
                                            <div class="col-lg-12">
                                                <label for="site">Le problème concerné :</label>
                                                <select id="sujet" name="sujet" class="form-control">
                                                    <option value=-1><?php echo $sujet ?></option>
                                                    <option value=0>Difficultés de réservation : Problèmes de paiement, réservations non confirmées.</option>
                                                    <option value=1>Problèmes techniques : Lenteur du site, bugs pendant l'utilisation.</option>
                                                    <option value=2>Informations incorrectes : Horaires, tarifs ou événements mal affichés.</option>
                                                    <option value=3>Délai de traitement des réclamations : Réponses tardives aux réclamations.</option>
                                                    <option value=4>Plusieurs ou autre(s).</option>
                                                </select>
                                            </div>
                                            <p id="errsujet"></p>
                                            <div class="col-lg-12">
                                                <label for="description">Description du problème :</label>
                                                <textarea id="description" name="description" rows="5" class="form-control" ><?php echo $reclamation['description']?></textarea>
                                            </div>
                                            <p id="errdescription"></p>
                                            <div class="col-lg-4 mx-auto mt-2">
                                                <button type="submit" class="form-control">Soumettre</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
    }
    else
    echo "there is an error";
    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <footer class="site-footer">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-4 col-12 me-auto">


                                <ul class="social-icon mt-4">
                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-facebook">
                                        </a>
                                    </li>
        
                                    <li class="social-icon-item">
                                        <a href="https://x.com/" target="_new" class="social-icon-link bi-twitter">
                                        </a>
                                    </li>

                                    <li class="social-icon-item">
                                        <a href="#" class="social-icon-link bi-whatsapp">
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-12 mt-4 mb-3 mt-lg-0 mb-lg-0">
                                <em class="text-white d-block mb-4">Contact:</em>

                                <p class="d-flex mb-1">
                                    <strong class="me-2">Phone:</strong>
                                    <a href="tel: 305-240-9671" class="site-footer-link">
                                        +21699999999
                                    </a>
                                </p>

                                <p class="d-flex">
                                    <strong class="me-2">Email:</strong>

                                    <a href="mailto:info@yourgmail.com" class="site-footer-link">
                                        contact@museetopia.org
                                    </a>
                                </p>
                            </div>


                            <div class="col-lg-5 col-12">
                                <em class="text-white d-block mb-4">Les horaires du Travail.</em>

                                <ul class="opening-hours-list">
                                    <li class="d-flex">
                                        Lundi - Vendredi
                                        <span class="underline"></span>

                                        <strong>9:00 - 18:00</strong>
                                    </li>

                                    <li class="d-flex">
                                        Samedi
                                        <span class="underline"></span>

                                        <strong>11:00 - 16:30</strong>
                                    </li>

                                    <li class="d-flex">
                                        Dimanche
                                        <span class="underline"></span>

                                        <strong>11:30 - 16:30</strong>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-8 col-12 mt-4">
                                <p class="copyright-text mb-0">Copyright © MuséeTopia
                                </p></div>

                    </div>
                </footer>
            </main>

 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/vegas.min.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/controledesaisie.js"></script> 

    </body>
</html>
