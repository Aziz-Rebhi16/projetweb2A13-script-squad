<?php
include_once 'db.php'; // Connexion à la base de données
include_once 'header.php'; // Fichier d'en-tête

// Récupérer les paramètres de tri et de recherche
$tri = isset($_GET['tri']) ? $_GET['tri'] : 'az'; // Valeur par défaut : tri A-Z
$search = isset($_GET['search']) ? trim($_GET['search']) : ''; // Recherche par défaut vide

// Adapter la requête SQL en fonction du tri sélectionné
switch ($tri) {
    case 'za':
        $order = 'nom_produit DESC'; // Tri Z-A
        break;
    case 'prix_asc':
        $order = 'prix_produit ASC'; // Prix croissant
        break;
    case 'prix_desc':
        $order = 'prix_produit DESC'; // Prix décroissant
        break;
    case 'az':
    default:
        $order = 'nom_produit ASC'; // Tri A-Z par défaut
        break;
}

// Classe Produits pour récupérer les produits triés et filtrés
class Produits {
    public function getProduits($order = 'nom_produit ASC', $search = '') {
        $db = Database::getConnexion();

        // Ajouter une condition WHERE pour la recherche
        $sql = "SELECT * FROM produits WHERE nom_produit LIKE :search ORDER BY $order";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Récupérer la liste des produits triés et filtrés
$produitsManager = new Produits();
$produits = $produitsManager->getProduits($order, $search);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<!-- Bouton pour aller au panier -->
<div style="text-align: right; margin-top: 150px; margin-right: 10px;">
    <a href="panie.php" style="padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">
        🛒 Voir le Panier
    </a>
</div>

<section class="produits-section section-padding">
    <div class="container">
        <h2 class="text-center mb-5">Liste des Produits</h2>
        
        <!-- Formulaire de tri et de recherche -->
        <div style="margin-bottom: 20px;">
            <form id="tri-form" method="GET" class="d-flex">
                <input type="text" name="search" placeholder="Rechercher un produit..." 
                       class="form-control" 
                       value="<?= htmlspecialchars($search) ?>" 
                       style="flex: 1; margin-right: 10px;">
                
                <select id="tri" name="tri" class="form-control" style="width: 200px; margin-right: 10px;">
                    <option value="az" <?= ($tri == 'az') ? 'selected' : '' ?>>A-Z</option>
                    <option value="za" <?= ($tri == 'za') ? 'selected' : '' ?>>Z-A</option>
                    <option value="prix_asc" <?= ($tri == 'prix_asc') ? 'selected' : '' ?>>Prix croissant</option>
                    <option value="prix_desc" <?= ($tri == 'prix_desc') ? 'selected' : '' ?>>Prix décroissant</option>
                </select>
                
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
        </div>

        <!-- Produits -->
        <div class="row">
            <?php if (!empty($produits)): ?>
                <?php foreach ($produits as $produit): ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <img src="<?= htmlspecialchars($produit['image_produit']) ?>" 
                             alt="<?= htmlspecialchars($produit['nom_produit']) ?>" 
                             style="max-width: 150px; max-height: 150px; object-fit: cover; border-radius: 4px;">

                        <div class="product-card">
                            <div class="product-info">
                                <h5 class="mt-3"><?= htmlspecialchars($produit['nom_produit']) ?></h5>
                                <p><?= htmlspecialchars($produit['description_produit']) ?></p>
                                <strong>Prix : <?= htmlspecialchars($produit['prix_produit']) ?> TND</strong>
                            </div>
                            

                            <!-- Bouton pour ajouter au panier -->
                            <form class="ajouter-panier-form">
                                <input type="hidden" name="produit_id" value="<?= $produit['id'] ?>">
                                <input type="number" name="quantite" value="1" min="1" class="form-control mt-2">
                                <button type="button" class="btn btn-primary mt-2 w-100 ajouter-panier-btn">Ajouter au Panier</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Aucun produit trouvé pour "<strong><?= htmlspecialchars($search) ?></strong>".</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>

<script>
    $(document).ready(function () {
        // Fonction AJAX pour ajouter au panier
        $('.ajouter-panier-btn').on('click', function (e) {
            e.preventDefault();
            let form = $(this).closest('.ajouter-panier-form');
            let produitId = form.find('input[name="produit_id"]').val();
            let quantite = form.find('input[name="quantite"]').val();

            $.ajax({
                url: 'ajouter_au_panier.php',
                type: 'POST',
                data: { produit_id: produitId, quantite: quantite },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        afficherNotification("Produit ajouté au panier !");
                    } else {
                        afficherNotification("Erreur : " + response.message);
                    }
                },
                error: function () {
                    afficherNotification("Produit ajouté au panier !");
                }
            });
        });

        // Mise à jour des paramètres de tri au clic
        $('#tri').change(function() {
            var tri = $(this).val();
            var search = $('input[name="search"]').val();
            window.location.href = '?tri=' + tri + '&search=' + search; // Redirection vers la page avec le nouveau tri
        });

        function afficherNotification(message) {
            let notification = $('<div class="notification"></div>')
                .text(message)
                .css({
                    position: 'fixed',
                    top: '20px',
                    right: '20px',
                    background: '#28a745',
                    color: 'white',
                    padding: '10px 20px',
                    borderRadius: '5px',
                    zIndex: 1000,
                    boxShadow: '0 0 10px rgba(0,0,0,0.2)',
                });

            $('body').append(notification);

            setTimeout(function () {
                notification.fadeOut(400, function () {
                    $(this).remove();
                });
            }, 3000);
        }
    });
</script>

</body>
</html>
