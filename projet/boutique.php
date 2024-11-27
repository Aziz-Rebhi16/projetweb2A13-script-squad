<?php
include_once 'db.php';
include_once 'produit.php';

// Vérifier si le formulaire d'ajout de produit a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter_produit'])) {
    $nom = $_POST['nom_produit'];
    $description = $_POST['description_produit'];
    $prix = $_POST['prix_produit'];
    $image = $_POST['image_produit'];

    // Ajouter le produit à la base de données
    $produitManager = new Produits();
    $produitManager->ajouter_produit($nom, $description, $prix, $image);
}

// Récupérer tous les produits existants
$produitManager = new Produits();
$produits = $produitManager->getProduits();
?>

<section class="ajout-produit-section section-padding">
    <div class="container">
        <h2 class="text-center mb-5">Ajouter un Nouveau Produit</h2>
        <form method="POST" action="boutique.php">
            <div class="form-group">
                <label for="nom_produit">Nom du Produit :</label>
                <input type="text" class="form-control" id="nom_produit" name="nom_produit" required>
            </div>
            <div class="form-group">
                <label for="description_produit">Description :</label>
                <textarea class="form-control" id="description_produit" name="description_produit" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="prix_produit">Prix (TND) :</label>
                <input type="number" class="form-control" id="prix_produit" name="prix_produit" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="image_produit">Image (nom du fichier) :</label>
                <input type="text" class="form-control" id="image_produit" name="image_produit" required>
            </div>
            <button type="submit" name="ajouter_produit" class="btn btn-success mt-3">Ajouter le Produit</button>
        </form>
    </div>
</section>

<section class="boutique-section section-padding">
    <div class="container">
        <div class="row">
            <h2 class="text-center mb-5">Nos Produits</h2>
            <h4 class="text-center mb-5">Produits inspirés de l'art et du patrimoine :</h4>

            <?php foreach ($produits as $produit): ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="product-card">
                        <img src="images/<?= htmlspecialchars($produit['image_produit']) ?>" class="img-fluid" alt="<?= htmlspecialchars($produit['nom_produit']) ?>">
                        <h5 class="mt-3"><?= htmlspecialchars($produit['nom_produit']) ?></h5>
                        <p><?= htmlspecialchars($produit['description_produit']) ?></p>
                        <strong>Prix : <?= htmlspecialchars($produit['prix_produit']) ?> TND</strong>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
