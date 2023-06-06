<?php
// Inclure le fichier contenant la classe BddManager
require_once 'BddManager.php';

// Obtenir l'instance de BddManager
$bddManager = BddManager::getInstance();

// Obtenir la connexion à la base de données
$connection = $bddManager->getConnection();

// Exécuter une requête
$query = "SELECT * FROM table";
$result = $bddManager->executeQuery($query);

// Traiter les résultats
while ($row = $result->fetch_assoc()) {
    // Faire quelque chose avec chaque ligne de résultat
    echo $row['column_name'];
}

// Fermer la connexion
$bddManager->closeConnection();
?>
