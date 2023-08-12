<?php
// Connexion à la base de données
$servername = "localhost";
$username = "votre_nom_d_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Requête pour insérer les informations d'inscription dans la base de données
$query = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe) VALUES ('$username', '$password')";
if ($conn->query($query) === TRUE) {
    // Démarrer une session et stocker le nom d'utilisateur
    session_start();
    $_SESSION['username'] = $username;
    
    // Rediriger vers la page d'accueil
    header("Location: home.php");
    exit();
} else {
    echo "Erreur lors de l'inscription : " . $conn->error;
}

$conn->close();
?>
