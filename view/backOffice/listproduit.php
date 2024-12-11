<?php
include_once '../../model/db.php';
include_once '../../model/produit.php';

// Utiliser la classe Produits pour récupérer la liste des produits
$produitManager = new Produits();
$produits = $produitManager->getProduits();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .product-info {
            padding: 15px;
        }
    </style>
</head>
<section class="produits-section section-padding">
    <div class="container">
        <h2 class="text-center mb-5">Liste des Produits</h2>
        <div class="row">
            <?php foreach ($produits as $produits): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="product-card">
                        <img src="../../images/<?= htmlspecialchars($produits['image_produit']) ?>" class="img-fluid" alt="<?= htmlspecialchars($produits['nom_produit']) ?>">
                        <h5 class="mt-3"><?= htmlspecialchars($produits['nom_produit']) ?></h5>
                        <p><?= htmlspecialchars($produits['description_produit']) ?></p>
                        <strong>Prix : <?= htmlspecialchars($produits['prix_produit']) ?> TND</strong>

                        <!-- Formulaire pour supprimer un produit -->
                        <form action="../../controller/delete_produit.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                            <input type="hidden" name="id" value="<?= $produits['id'] ?>">
                            <button type="submit" class="btn btn-danger mt-2">Supprimer</button>
                        </form>

                        <!-- Formulaire pour modifier un produit -->
                        <form action="../../controller/update_produit.php" method="GET">
                            <input type="hidden" name="id" value="<?= $produits['id'] ?>">
                            <button type="submit" class="btn btn-warning mt-2">Modifier</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</html>



