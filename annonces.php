<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRT Conseil - Annonces</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>TRT Conseil - Plateforme de Recrutement</h1>
        <p>La solution pour trouver le bon emploi dans l'hôtellerie et la restauration.</p>
    </header>
    <main>
        <section class="annonce-list">
            <h2>Annonces disponibles</h2>
            <?php
            // Connexion à la base de données SQLite
            $db = new SQLite3('db.sqlite');

            // Récupérer les annonces approuvées
            $query = "SELECT * FROM annonces WHERE approved = 1";
            $results = $db->query($query);

            while ($row = $results->fetchArray()) {
                echo "<div class='annonce'>";
                echo "<h3>{$row['title']}</h3>";
                echo "<p>Lieu : {$row['location']}</p>";
                echo "<p>Description : {$row['description']}</p>";
                echo "<a href='traitement_postuler.php?annonce_id={$row['id']}'>Postuler</a>";
                echo "</div>";
            }

            // Fermer la connexion à la base de données
            $db->close();
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 TRT Conseil. Tous droits réservés.</p>
    </footer>
</body>
</html>
