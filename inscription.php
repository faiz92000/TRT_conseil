<?php
// Chemin vers votre base de données SQLite sur Repl.it
$db_path = $_SERVER['DOCUMENT_ROOT'] . "/chemin/vers/votre/base_de_donnees.sqlite";

// Connexion à la base de données
$conn = new SQLite3($db_path);

// Code d'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $confirmation_mot_de_passe = $_POST["confirmation_mot_de_passe"];
    $type_utilisateur = $_POST["type_utilisateur"];

    // Vérifier si le mot de passe correspond à la confirmation
    if ($mot_de_passe != $confirmation_mot_de_passe) {
        $error_message = "Les mots de passe ne correspondent pas.";
    } else {
        // Hasher le mot de passe
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $stmt = $conn->prepare("INSERT INTO Utilisateurs (email, mot_de_passe, type_utilisateur, statut) VALUES (?, ?, ?, ?)");
        $statut = "en attente d'approbation"; // Statut par défaut pour l'approbation par un consultant
        $stmt->bind_param("ssss", $email, $mot_de_passe_hache, $type_utilisateur, $statut);

        if ($stmt->execute()) {
            $success_message = "Inscription réussie. En attente d'approbation.";
        } else {
            $error_message = "Erreur lors de l'inscription.";
        }
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription - TRT Conseil</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>
        <?php
        if (isset($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }
        if (isset($success_message)) {
            echo "<p class='success'>$success_message</p>";
        }
        ?>
        <form action="inscription.php" method="post">
            <input type="email" name="email" placeholder="Adresse e-mail" required>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
            <input type="password" name="confirmation_mot_de_passe" placeholder="Confirmez le mot de passe" required>
            <select name="type_utilisateur">
                <option value="candidat">Candidat</option>
                <option value="recruteur">Recruteur</option>
                <option value="consultant">Consultant</option>
            </select>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Vous avez déjà un compte ? <a href="index.php">Connectez-vous</a></p>
    </div>
</body>
</html>
