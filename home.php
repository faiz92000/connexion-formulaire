<!DOCTYPE html>
<html>
<head>
    <title>Page d'Accueil</title>
</head>
<body>
    <h2>Bienvenue sur la Page d'Accueil</h2>
    
    <?php
    session_start();
    if(isset($_SESSION['username'])) {
        echo "<p>Connecté en tant que : " . $_SESSION['username'] . "</p>";
        echo "<p><a href='logout.php'>Se déconnecter</a></p>";
    } else {
        echo "<p>Vous n'êtes pas connecté.</p>";
    }
    ?>
</body>
</html>
