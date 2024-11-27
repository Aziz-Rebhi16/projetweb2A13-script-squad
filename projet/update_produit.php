<?php
include_once 'db.php';
include_once 'produit.php';
include_once 'ajouter_produit.php'; 

// Vérifier si un ID est passé via GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Créer une instance de la classe ProduitManager pour récupérer les informations du produit
    $produitManager = new ProduitManager();
    $produits = $produitManager->getProduitById($id); // Correction ici pour récupérer le produit
}

// Si le formulaire est soumis, mettre à jour les informations du produit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];

    // Créer un objet Produit avec les nouvelles données
    $produits = new Produit();
    $produits->setNomProduit($nom);      
    $produits->setDescription($description);
    $produits->setPrixProduit($prix);
    $produits->setImage($image);

    // Mettre à jour le produit dans la base de données
    $produitManager->updateProduit($produits, $id); // Utilisez updateProduit ici pour mettre à jour les données

    // Rediriger après la mise à jour
    header('Location: listproduit.php');
    exit();
}
?>

<form action="update_produit.php?id=<?= $_GET['id'] ?>" method="POST">
    <div class="form-group">
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" value="<?= $produits['nom_produit'] ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"><?= $produits['description_produit'] ?></textarea>
    </div>

    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="number" name="prix" id="prix" value="<?= $produits['prix_produit'] ?>" class="form-control">
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" name="image" id="image" value="<?= $produits['image_produit'] ?>" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>

<?php
class ProduitManager {

    // Méthode pour récupérer un produit par son ID
    public function getProduitById($id) {
        $sql = "SELECT * FROM produits WHERE id = :id";
        $db = Database::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour mettre à jour un produit
    public function updateProduit(Produit $produit, $id) {
        try {
            $db = Database::getConnexion();
            $query = $db->prepare(
                'UPDATE produits SET
                    nom_produit = :nom_produit,
                    prix_produit = :prix_produit,
                    description_produit = :description_produit,
                    image_produit = :image_produit
                WHERE id = :id'
            );

            $query->execute([
                'id' => $id,
                'nom_produit' => $produit->getNomProduit(),
                'prix_produit' => $produit->getPrixProduit(),
                'description_produit' => $produit->getDescription(),
                'image_produit' => $produit->getImage(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}






// Exemple de classe Produits
class Produit {
    private $nom_produit;
    private $description_produit;
    private $prix_produit;
    private $image_produit;

    // Setters
    public function setNomProduit($nom_produit) {
        $this->nom_produit = $nom_produit;
    }

    public function setDescription($description_produit) {
        $this->description_produit = $description_produit;
    }

    public function setPrixProduit($prix_produit) {
        $this->prix_produit = $prix_produit;
    }

    public function setImage($image_produit) {
        $this->image_produit = $image_produit;
    }

    // Getters
    public function getNomProduit() {
        return $this->nom_produit;
    }

    public function getDescription() {
        return $this->description_produit;
    }

    public function getPrixProduit() {
        return $this->prix_produit;
    }

    public function getImage() {
        return $this->image_produit;
    }
}

?>
