<?php
session_start();

// Vérifiez si l'utilisateur est connecté en tant que candidat
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'candidat') {
    // Rediriger vers la page d'accès refusé ou autre
    header('Location: acces_refuse.php');
    exit;
}

// Récupérez les informations du candidat depuis la base de données
// Remplacez les données fictives par votre logique de récupération des données
$candidatInfo = array(
    'id' => 1, // ID du candidat
    'nom' => 'John',
    'prenom' => 'Doe',
    // ... autres informations spécifiques au candidat ...
);

// Gestion de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et nettoyer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    // ... autres champs du formulaire ...
    
    // Traiter l'upload du CV
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'cv_uploads/';
        $uploadFile = $uploadDir . basename($_FILES['cv']['name']);
        if (move_uploaded_file($_FILES['cv']['tmp_name'], $uploadFile)) {
            // Le fichier a été téléchargé avec succès, vous pouvez enregistrer le chemin dans la base de données
            // Remplacez cette partie par votre logique d'enregistrement dans la base de données
        }
    }
    
    // Mettre à jour les informations du candidat dans la base de données
    // Remplacez cette partie par votre logique d'enregistrement dans la base de données
    
    // Rediriger vers une page de confirmation ou autre
    header('Location: profil_completer_confirmation.php');
    exit;
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
            <h2>Compléter votre profil en tant que Candidat</h2>
            <form action="completer_profil_candidat.php" method="POST" enctype="multipart/form-data">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $candidatInfo['nom']; ?>" required>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $candidatInfo['prenom']; ?>" required>
                <label for="cv">CV (PDF) :</label>
                <input type="file" id="cv" name="cv" accept="application/pdf" required>
                <button type="submit">Enregistrer</button>
            </form>
        </section>
    </main>
    <footer>
       
