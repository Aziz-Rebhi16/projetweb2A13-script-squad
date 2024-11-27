

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
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des Produits</h1>
        <div class="row">
            <?php
            // Inclure le fichier contenant la classe Produits et la connexion à la base de données
            include_once 'produit.php';
            include_once 'db.php';

            try {
                // Créer une instance de la classe Produits
                $produitManager = new Produits();
                // Récupérer la liste des produits
                $listeProduits = $produitManager->getProduits();

                if (!empty($listeProduits)) {
                    // Parcourir et afficher chaque produit
                    foreach ($listeProduits as $prod) {
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="<?= htmlspecialchars($prod['image_produit']); ?>" alt="<?= htmlspecialchars($prod['nom_produit']); ?>">
                                </div>
                                <div class="product-info">
                                    <h5 class="product-title"><?= htmlspecialchars($prod['nom_produit']); ?></h5>
                                    <p class="text-muted"><?= htmlspecialchars($prod['description_produit']); ?></p>
                                    <p class="price text-primary"><strong>Prix: <?= htmlspecialchars($prod['prix_produit']); ?> TND</strong></p>
                                    <a href="update_produit.php?id=<?= $prod['id']; ?>" class="btn btn-sm btn-warning">Modifier</a>
                                    <a href="delete_produit.php?id=<?= $prod['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<p class="text-center">Aucun produit trouvé.</p>';
                }
            } catch (Exception $e) {
                echo '<p class="text-danger">Erreur : ' . $e->getMessage() . '</p>';
            }
            ?>
        </div>
    </div>

    <!-- Inclure Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
