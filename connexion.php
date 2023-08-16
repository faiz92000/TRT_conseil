<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>TRT Conseil - Plateforme de Recrutement</h1>
        <p>La solution pour trouver le bon emploi dans l'hôtellerie et la restauration.</p>
    </header>
<main>
        <section class="auth-form">
            <h2>Connexion</h2>
            <form action="traitement_connexion.php" method="POST">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Se connecter</button>
            </form>
        </section>
    </main>
<footer>
        <p>&copy; 2023 TRT Conseil. Tous droits réservés.</p>
    </footer>
</body>
</html>
