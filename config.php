<?php
class Config
{
    private static $pdo = null;      

    public static function getConnexion()
    {
        // Vérification si la connexion n'est pas déjà établie
        if (!isset(self::$pdo)) {
            // Paramètres de connexion à la base de données
            $servername = "localhost";
            $username = "root"; // Assure-toi que le nom d'utilisateur est correct
            $password = ""; // Assure-toi que le mot de passe est correct
            $dbname = "museebooking"; // Assure-toi que le nom de la base de données est correct

            try {
                // Création de l'instance PDO pour la connexion
                self::$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

                // Configuration de l'option pour afficher les erreurs
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Configuration de l'option pour récupérer les résultats sous forme de tableau associatif
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (Exception $e) {
                // Gestion des erreurs en cas de problème de connexion
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }

        // Retourne l'instance PDO
        return self::$pdo;
    }
}

// Test de la connexion
Config::getConnexion();
?>
