<?php
include_once 'db.php';
include_once 'produit.php';

// Utiliser la classe Produits pour récupérer la liste des produits
$produitManager = new Produits();
$produits = $produitManager->getProduits();
?>

<section class="produits-section section-padding">
    <div class="container">
        <h2 class="text-center mb-5">Liste des Produits</h2>
        <div class="row">
            <?php foreach ($produits as $produits): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="product-card">
                        <img src="images/<?= htmlspecialchars($produits['image_produit']) ?>" class="img-fluid" alt="<?= htmlspecialchars($produits['nom_produit']) ?>">
                        <h5 class="mt-3"><?= htmlspecialchars($produits['nom_produit']) ?></h5>
                        <p><?= htmlspecialchars($produits['description_produit']) ?></p>
                        <strong>Prix : <?= htmlspecialchars($produits['prix_produit']) ?> TND</strong>

                        <!-- Formulaire pour supprimer un produit -->
                        <form action="delete_produit.php" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                            <input type="hidden" name="id" value="<?= $produits['id'] ?>">
                            <button type="submit" class="btn btn-danger mt-2">Supprimer</button>
                        </form>

                        <!-- Formulaire pour modifier un produit -->
                        <form action="update_produit.php" method="GET">
                            <input type="hidden" name="id" value="<?= $produits['id'] ?>">
                            <button type="submit" class="btn btn-warning mt-2">Modifier</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
