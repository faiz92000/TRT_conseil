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
        <section class="auth-form">
            <h2>Inscription</h2>
            <form action="traitement_inscription.php" method="POST">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <label for="userType">Type d'utilisateur :</label>
                <select id="userType" name="userType" required>
                    <option value="recruteur">Recruteur</option>
                    <option value="candidat">Candidat</option>
                </select>
                <label for="firstName">Prénom :</label>
                <input type="text" id="firstName" name="firstName" required>
                <label for="lastName">Nom :</label>
                <input type="text" id="lastName" name="lastName" required>
                <label for="birthdate">Date de naissance :</label>
                <input type="date" id="birthdate" name="birthdate" required>
                <button type="submit">S'inscrire</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 TRT Conseil. Tous droits réservés.</p>
    </footer>
</body>
</html>
