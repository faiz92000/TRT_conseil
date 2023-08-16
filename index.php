<!DOCTYPE html>
<html>
<head>
    <title>TRT Conseil - Accueil</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>TRT Conseil</h1>
        <form action="connexion.php" method="post">
            <input type="email" name="email" placeholder="Adresse e-mail" required>
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
        <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous</a></p>
    </div>
</body>
</html>
