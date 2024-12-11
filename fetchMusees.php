<?php
require 'config.php'; // Assurez-vous que le chemin est correct

try {
    // Connexion à la base de données
    $pdo = Config::getConnexion();

    // Vérifier que region_id est bien envoyé
    if (isset($_POST['region_id'])) {
        $region_id = $_POST['region_id'];

        // Récupération des musées pour la région spécifiée
        $sql_musees = "SELECT * FROM musees WHERE region_id = :region_id";
        $stmt_musees = $pdo->prepare($sql_musees);
        $stmt_musees->bindParam(':region_id', $region_id, PDO::PARAM_INT);
        $stmt_musees->execute();
        $musees = $stmt_musees->fetchAll();

        // Affichage des musées
        if ($musees) {
            foreach ($musees as $musee) {
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($musee['nom']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($musee['description']) . '</p>';
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
    <title>Liste des musées</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Inclus jQuery -->
</head>
<body>

    <!-- Formulaire pour sélectionner la région -->
    <h2>Choisissez une région pour voir les musées</h2>
    <form id="regionForm">
        <label for="region_id">Choisir une région :</label>
        <select id="region_id" name="region_id">
            <option value="1">Région 1</option>
            <option value="2">Région 2</option>
            <option value="3">Région 3</option>
            <!-- Ajoutez ici les options de régions basées sur votre base de données -->
        </select>
        <button type="submit">Afficher les musées</button>
    </form>

    <!-- Div pour afficher les musées -->
    <div id="museesList"></div>

    <script>
        // Lorsque le formulaire est soumis
        $('#regionForm').on('submit', function(event) {
            event.preventDefault(); // Empêche la soumission du formulaire classique

            var regionId = $('#region_id').val(); // Récupère l'ID de la région sélectionnée

            // Envoi de la requête AJAX au backend (fetchMusees.php)
            $.ajax({
                url: 'fetchMusees.php', // Fichier PHP qui gère la logique
                type: 'POST',
                data: { region_id: regionId }, // Envoie l'ID de la région
                success: function(response) {
                    $('#museesList').html(response); // Affiche la réponse (les musées) dans la div
                },
                error: function() {
                    $('#museesList').html('<p>Erreur lors du chargement des musées.</p>');
                }
            });
        });
    </script>

</body>
</html>
