<?php
session_start();
include_once '../../model/db.php';
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Vérifier si le panier est vide
if (empty($_SESSION['panier'])) {
    echo "<p>Votre panier est vide. Impossible de passer à la caisse.</p>";
    exit;
}

// Calculer le total du panier
$total = 0;
foreach ($_SESSION['panier'] as $produit) {
    $total += $produit['prix'] * $produit['quantite'];
}

$errors = []; // Tableau pour les erreurs de validation

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmer'])) {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $carte_numero = $_POST['carte_numero'];
    $carte_csv = $_POST['carte_csv'];

    // Validation du numéro de carte
    if (strlen($carte_numero) != 16 || !ctype_digit($carte_numero)) {
        $errors['carte_numero'] = "Le numéro de carte doit contenir exactement 16 chiffres.";
    }

    // Validation du CSV
    if (strlen($carte_csv) != 3 || !ctype_digit($carte_csv)) {
        $errors['carte_csv'] = "Le code CSV doit contenir exactement 3 chiffres.";
    }

    if (empty($errors)) {
        try {
            // Enregistrement de la commande dans la base de données
            $stmt = $db->prepare("INSERT INTO commandes (total, nom, prenom, telephone, adresse) VALUES (:total, :nom, :prenom, :telephone, :adresse)");
            $stmt->bindParam(':total', $total);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':adresse', $adresse);
            $stmt->execute();
            $order_id = $db->lastInsertId();

            // Ajouter les détails des produits
            foreach ($_SESSION['panier'] as $produit) {
                $stmt = $db->prepare("INSERT INTO details_commande (order_id, produit_id, quantite, prix) VALUES (:order_id, :produit_id, :quantite, :prix)");
                $stmt->bindParam(':order_id', $order_id);
                $stmt->bindParam(':produit_id', $produit['id']);
                $stmt->bindParam(':quantite', $produit['quantite']);
                $stmt->bindParam(':prix', $produit['prix']);
                $stmt->execute();
            }

            // Vider le panier
            unset($_SESSION['panier']);
            
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                              // Set the Gmail SMTP server
                $mail->SMTPAuth = true;                                      // Enable SMTP authentication
                $mail->Username = 'museetopia@gmail.com';                     // Your Gmail address
                $mail->Password = 'svnoxsekihxgjunk';                       // Use the App Password you generated
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Use STARTTLS encryption
                $mail->Port = 587;                                          // Port 587 for STARTTLS
            
                // Recipients
                $mail->setFrom('museetopia@gmail.com', 'museetopia');          // Sender's email and name
                $mail->addAddress('abedayoub87@gmail.com', 'ayoub'); // Recipient's email and name
            
                // Content
                $mail->isHTML(true);                                         // Set email format to HTML
                $mail->Subject = 'achat confirmé !';
                $mail->Body    = 'merci pour votre achat 😊.';
                $mail->AltBody = 'This is the plain text version of the email.';
            
                // Send email
                if ($mail->send()) {
                    echo 'Message has been sent successfully!';
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
           


          
        } catch (Exception $e) {
            echo "<p><strong>Erreur :</strong> " . $e->getMessage() . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
        .input-error {
            border: 1px solid red;
        }
        header, footer {
            background-color: #f8f9fa;
            padding: 15px 20px;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        header h1, footer p {
            margin: 100;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        form {
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input, form textarea, form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        form button {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #218838;
        }
    </style>
    <title>Confirmation de commande</title>
</head>
<?php include 'header.php'; ?>
<body>
    <header>
        <h1></h1>
    </header>

    <div class="container">
        <h2>Confirmation de votre commande</h2>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmer']) && empty($errors)): ?>
            <!-- Confirmation de la commande -->
        <?php else: ?>
            <p>Merci pour votre achat ! Veuillez remplir vos informations pour finaliser la commande.</p>

            <form method="POST" action="confirmation.php">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>" required>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($_POST['prenom'] ?? '') ?>" required>

                <label for="telephone">Numéro de téléphone :</label>
                <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>" required>

                <label for="adresse">Adresse :</label>
                <textarea id="adresse" name="adresse" required><?= htmlspecialchars($_POST['adresse'] ?? '') ?></textarea>

                <label for="carte_numero">Numéro de la carte bancaire :</label>
                <input type="text" id="carte_numero" name="carte_numero" 
                       value="<?= htmlspecialchars($_POST['carte_numero'] ?? '') ?>" 
                       class="<?= isset($errors['carte_numero']) ? 'input-error' : '' ?>" required>
                <?php if (isset($errors['carte_numero'])): ?>
                    <div class="error"><?= $errors['carte_numero'] ?></div>
                <?php endif; ?>

                <label for="carte_csv">Code CSV :</label>
                <input type="text" id="carte_csv" name="carte_csv" 
                       value="<?= htmlspecialchars($_POST['carte_csv'] ?? '') ?>" 
                       class="<?= isset($errors['carte_csv']) ? 'input-error' : '' ?>" required>
                <?php if (isset($errors['carte_csv'])): ?>
                    <div class="error"><?= $errors['carte_csv'] ?></div>
                <?php endif; ?>

                <button type="submit" name="confirmer">Confirmer l'achat</button>
            </form>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Votre Boutique. Tous droits réservés.</p>
    </footer>
</body>
<?php include 'footer.php'; ?>
</html>
