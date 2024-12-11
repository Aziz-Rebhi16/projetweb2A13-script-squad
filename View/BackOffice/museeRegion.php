<?php
require 'config.php'; // Assurez-vous que le chemin est correct

try {
    // Connexion à la base de données
    $pdo = Config::getConnexion();

    // Vérifier que region_id est bien envoyé
    if (isset($_GET['region_id'])) {
        $region_id = $_GET['region_id']; // Récupérer l'ID de la région depuis l'URL

        // Récupération des musées pour la région spécifiée
        $sql_musees = "SELECT * FROM musees WHERE region_id = :region_id";
        $stmt_musees = $pdo->prepare($sql_musees);
        $stmt_musees->bindParam(':region_id', $region_id, PDO::PARAM_INT);
        $stmt_musees->execute();
        $musees = $stmt_musees->fetchAll();

        // Affichage des musées
        if ($musees) {
            echo '<h2>Liste des musées de la région</h2>';
            echo '<a href="addMusee.php?region_id=' . $region_id . '" class="btn btn-success">Ajouter un musée</a>';
            echo '<br><br>';
            foreach ($musees as $musee) {
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($musee['nom']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($musee['description']) . '</p>';
                echo '<a href="updateMusee.php?id=' . $musee['id'] . '" class="btn btn-warning">Modifier</a>';
                echo ' ';
                echo '<a href="deleteMusee.php?id=' . $musee['id'] . '" class="btn btn-danger" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce musée ?\');">Supprimer</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Aucun musée trouvé pour cette région.</p>';
        }
    } else {
        echo '<p>ID de région non fourni.</p>';
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Régions et Musées</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1 class="mb-4">Gestion des Régions et des Musées</h1>

        <!-- Liste des régions -->
        <div class="row">
            <?php foreach ($regions as $region): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <!-- Affichage de l'image de la région -->
                        <img src="path/to/images/<?php echo htmlspecialchars($region['image']); ?>" class="card-img-top" alt="Image de la région">
                        <div class="card-body">
                            <!-- Affichage du nom et description de la région -->
                            <h5 class="card-title"><?php echo htmlspecialchars($region['nom']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($region['description']); ?></p>

                            <!-- Bouton pour voir les musées, avec l'ID de la région -->
                            <button class="btn btn-primary btn-sm view-musees" data-region-id="<?php echo $region['id']; ?>">Voir les musées</button>

                            <!-- Liens pour modifier et supprimer la région -->
                            <a href="updateRegion.php?id=<?php echo $region['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="deleteRegion.php?id=<?php echo $region['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette région ?')">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Conteneur des musées d'une région (chargés via AJAX) -->
        <div id="musees-container" class="mt-5"></div>
    </div>

    <script>
        // Gestion du clic sur "Voir les musées"
        $(document).on('click', '.view-musees', function () {
    const regionId = $(this).data('region-id'); // Récupérer l'ID de la région
    $('#musees-container').html('<p>Chargement des musées...</p>');

    // Vérifiez que regionId est défini avant d'envoyer la requête
    if (!regionId) {
        console.error("L'ID de région est introuvable.");
        return;
    }

    // Requête AJAX
    $.ajax({
        url: 'fetchMusees.php', // Chemin à partir de la racine
        type: 'POST',
        data: { region_id: regionId }, // Envoi de la région_id
        success: function (response) {
            $('#musees-container').html(response);
        },
        error: function () {
            $('#musees-container').html('<p>Erreur lors du chargement des musées.</p>');
        }
    });


    </script>
</body>

</html>
