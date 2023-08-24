<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et nettoyer les données du formulaire
    $titre = $_POST['titre'];
    $lieu = $_POST['lieu'];
    $description = $_POST['description'];
    
    // Validation des données (exemples)
    if (empty($titre) || empty($lieu) || empty($description)) {
        echo "Tous les champs sont obligatoires.";
        exit;
    }
    
    // Connexion à la base de données SQLite
    $db = new SQLite3('db.sqlite');
    
    // Insérer l'annonce dans la table 'annonces'
    $query = "INSERT INTO annonces (recruteur_id, title, location, description)
              VALUES (:recruteur_id, :titre, :lieu, :description)";
    
    $stmt = $db->prepare($query);
    // Vous devez remplacer 'recruteur_id' par l'ID du recruteur connecté
    $stmt->bindValue(':recruteur_id', 1); // Exemple: l'ID du recruteur connecté
    $stmt->bindValue(':titre', $titre);
    $stmt->bindValue(':lieu', $lieu);
    $stmt->bindValue(':description', $description);
    
    // Exécuter la requête
    if ($stmt->execute()) {
        // Fermer la connexion à la base de données
        $db->close();
        
        // Rediriger vers la page de confirmation
        header('Location: confirmation_annonce.html');
        exit;
    } else {
        // Gérer une erreur d'insertion
        echo "Une erreur s'est produite lors de la publication de l'annonce.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRT Conseil - Publier une Annonce</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>TRT Conseil - Publier une Annonce</h1>
    </header>
    <main>
        <section>
            <h2>Publier une Annonce</h2>
            <p>Une erreur s'est produite lors de la publication de l'annonce. Veuillez réessayer plus tard.</p>
            <a href="publier_annonce.php">Retour au formulaire</a>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 TRT Conseil. Tous droits réservés.</p>
    </footer>
</body>
</html>
