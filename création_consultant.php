<?php
// Vérifier si l'utilisateur est un administrateur (vous devez avoir une méthode pour cela)
$isAdmin = true; // Remplacez par votre logique de vérification

if (!$isAdmin) {
    // Rediriger vers une page d'accès refusé ou autre
    header('Location: acces_refuse.php');
    exit;
}

// Traitement du formulaire de création de consultant
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et nettoyer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    // ... autres données ...
    
    // Connexion à la base de données SQLite
    $db = new SQLite3('db.sqlite');
    
    // Préparer et exécuter la requête d'insertion en utilisant une requête préparée
    $query = "INSERT INTO consultants (nom, prenom) VALUES (:nom, :prenom)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    
    if ($stmt->execute()) {
        // Fermer la connexion à la base de données
        $db->close();
        
        // Rediriger vers une page de confirmation ou autre
        header('Location: consultant_cree.php');
        exit;
    } else {
        // Gérer une erreur d'insertion
        echo "Une erreur s'est produite lors de la création du consultant.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRT Conseil - Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>TRT Conseil - Plateforme de Recrutement</h1>
        <p>La solution pour trouver le bon emploi dans l'hôtellerie et la restauration.</p>
    </header>
    <main>
        <section>
            <h2>Créer un consultant</h2>
            <form action="creer_consultant.php" method="POST">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
                <!-- ... autres champs du formulaire ... -->
                <button type="submit">Créer</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 TRT Conseil. Tous droits réservés.</p>
    </footer>
</body>
</html>
