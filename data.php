<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_nom_d'utilisateur";
$password = "votre_mot_de_passe";
$dbname = "nom_de_votre_base_de_données";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Fonction pour enregistrer un nouvel utilisateur
function enregistrerUtilisateur($email, $mot_de_passe, $type_utilisateur) {
    global $conn;
    
    $stmt = $conn->prepare("INSERT INTO Utilisateurs (email, mot_de_passe, type_utilisateur, statut) VALUES (?, ?, ?, ?)");
    $statut = "en attente d'approbation"; // Statut par défaut pour l'approbation par un consultant
    
    $stmt->bind_param("ssss", $email, $mot_de_passe, $type_utilisateur, $statut);
    
    return $stmt->execute();
}

function connecterUtilisateur($email, $mot_de_passe) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT id, type_utilisateur FROM Utilisateurs WHERE email = ? AND mot_de_passe = ?");
    
    $stmt->bind_param("ss", $email, $mot_de_passe);
    $stmt->execute();
    $stmt->bind_result($id_utilisateur, $type_utilisateur);
    $stmt->fetch();
    
    $stmt->close();
    
    if ($id_utilisateur) {
        // L'utilisateur a été trouvé et les informations de connexion sont correctes
        return array("id_utilisateur" => $id_utilisateur, "type_utilisateur" => $type_utilisateur);
    } else {
        // L'utilisateur n'a pas été trouvé ou les informations de connexion sont incorrectes
        return false;
    }
}

// Autres fonctions à développer :

// - Créer un consultant
// - Compléter le profil d'un candidat ou d'un recruteur
// - Publier une annonce
// - Approbation d'annonces par les consultants
// - Postuler à une annonce

// Fermeture de la connexion à la base de données
$conn->close();
?>
