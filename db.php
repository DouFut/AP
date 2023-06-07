<?php
$servername = "localhost"; // Adresse du serveur
$username = "id18236452_localhost"; // Nom d'utilisateur par défaut pour WampServer
$password = "Judo10400%"; // Mot de passe par défaut pour WampServer
$dbname = "id18236452_localhost"; // Nom de votre base de données PHPMyAdmin

// Connexion à la base de données
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

echo "Connexion réussie !";

// Fermer la connexion
mysqli_close($conn);
?>
