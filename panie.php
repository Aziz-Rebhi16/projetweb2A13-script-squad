
<?php
session_start();

// Inclure la connexion à la base de données
include_once 'db.php'; // Connexion à la base de données via PDO

// Vérifier si le panier est déjà initialisé dans la session
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Fonction pour ajouter un produit au panier
function ajouterAuPanier($id_produit, $quantite = 1) {
    global $db;

    // Vérifier si le produit existe dans la base de données
    $sql = "SELECT * FROM produits WHERE id = :id_produit";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_produit', $id_produit, PDO::PARAM_INT);
    $stmt->execute();
    $produit = $stmt->fetch();

    if ($produit) {
        // Si le produit existe, on l'ajoute au panier dans la session
        $_SESSION['panier'][$id_produit] = [
            'id' => $produit['id'],
            'nom' => $produit['nom_produit'],
            'prix' => $produit['prix_produit'],
            'quantite' => $quantite,
            'image' => isset($produit['image_produit']) ? $produit['image_produit'] : 'default-image.jpg' // Valeur par défaut si l'image n'existe pas
        ];
    }
}

function supprimerDuPanier($produit_id) {
    global $db;

    // Supprimer le produit de la table `panier` dans la base de données
    $sql = "DELETE FROM panier WHERE produit_id = :produit_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
    $stmt->execute();

    // Supprimer le produit de la session
    if (isset($_SESSION['panier'][$produit_id])) {
        unset($_SESSION['panier'][$produit_id]);
    }
}

// Fonction pour afficher le panier
function afficherPanier() {
    $total = 0;
    if (!empty($_SESSION['panier'])) {
        foreach ($_SESSION['panier'] as $produit) {
            echo "<div class='product'>";
            // Afficher l'image du produit
            echo "<img src='" . htmlspecialchars($produit['image']) . "' alt='" . htmlspecialchars($produit['nom']) . "' width='100'>";
            echo "<p>" . htmlspecialchars($produit['nom']) . "</p>";
            echo "<p>Prix: " . number_format($produit['prix'], 2) . " TND</p>";
            echo "<p>Quantité: " . $produit['quantite'] . "</p>";
            echo "<p>Total: " . number_format($produit['prix'] * $produit['quantite'], 2) . " TND</p>";
            echo "<form method='POST' action='panie.php'>";
            echo "<input type='hidden' name='id_produit' value='" . $produit['id'] . "'>";
            echo "<button type='submit' name='supprimer' class='btn btn-danger'>Supprimer</button>";
            echo "</form>";
            echo "</div>";

            $total += $produit['prix'] * $produit['quantite'];
        }

        echo "<div class='total'>";
        echo "<h3>Total du panier: " . number_format($total, 2) . " TND</h3>";
        echo "<a href='confirmation.php' class='btn btn-success'>Passer à la caisse</a>";
        echo "</div>";
    } else {
        echo "<p>Votre panier est vide.</p>";
    }
}


// Gérer les actions de formulaire
if (isset($_POST['ajouter'])) {
    $id_produit = $_POST['id_produit'];
    $quantite = isset($_POST['quantite']) ? $_POST['quantite'] : 1;
    ajouterAuPanier($id_produit, $quantite);
}

if (isset($_POST['supprimer'])) {
    $id_produit = $_POST['id_produit'];
    supprimerDuPanier($id_produit);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,400;0,600;0,700;1,200;1,700&display=swap" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">
        <link href="css/vegas.min.css" rel="stylesheet">
        <link href="css/tooplate-barista.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg">                
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="Barista Cafe Template">
                    Musée Topia
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item"><a class="nav-link click-scroll" href="#section_1">acceuil</a></li>
                        <li class="nav-item"><a class="nav-link click-scroll" href="#section_2">à propos</a></li>
                        <li class="nav-item"><a class="nav-link click-scroll" href="#section_2">notre boutique</a></li>
                        <li class="nav-item"><a class="nav-link click-scroll" href="#section_4">avis</a></li>
                        <li class="nav-item"><a class="nav-link click-scroll" href="#section_5">Contact</a></li>
                    </ul>
                    <div class="ms-lg-3">
                        <a class="btn custom-btn custom-border-btn" href="reservation.php">Reservation<i class="bi-arrow-up-right ms-2"></i></a>
                    </div>
                    <div class="ms-lg-3">
                        <a class="btn custom-btn custom-border-btn" href="produitview.php">Boutique<i class="bi-arrow-up-right ms-2"></i></a>
                    </div>
                   
                </div>
            </div>
        </nav>

        
<h1 style=" margin-top: 90px;"> Votre Panier</h1> 
<?php afficherPanier(); ?>

</body>
</html>
<?php include 'footer.php'; ?>