<?php
$servername = "localhost"; // Adresse du serveur
$username = "root"; // Nom d'utilisateur par défaut pour WampServer
$password = ""; // Mot de passe par défaut pour WampServer
$dbname = "nom_de_la_base_de_donnees"; // Nom de votre base de données PHPMyAdmin

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
