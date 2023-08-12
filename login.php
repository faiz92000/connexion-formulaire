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

// Requête pour vérifier les informations de connexion
$query = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$username' AND mot_de_passe = '$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // Démarrer une session et stocker le nom d'utilisateur
    session_start();
    $_SESSION['username'] = $username;
    
    // Rediriger vers la page d'accueil
    header("Location: home.php");
    exit();
} else {
    echo "Échec de la connexion. Veuillez vérifier vos informations.";
}

$conn->close();
?>
