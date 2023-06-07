<?php
// Inclure le fichier contenant la classe Database
require_once 'dal.php';

// Obtenir l'instance de Database
$database = Database::getInstance();

// Obtenir la chaîne de connexion
$connectionString = $database->getConnectionString();

// Obtenir le nom d'utilisateur
$username = $database->getUsername();

// Obtenir le mot de passe
$password = $database->getPassword();

?>
