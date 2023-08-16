<!DOCTYPE html>
<html>
<head>
    <title>TRT Conseil - Profil Candidat</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Profil Candidat</h1>
        <form action="completer_profil.php" method="post">
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="text" name="prenom" placeholder="Prénom" required>
            <input type="file" name="cv" accept=".pdf" required>
            <button type="submit">Compléter le profil</button>
        </form>
    </div>
</body>
</html>
