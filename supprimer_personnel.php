<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nom_de_la_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connexion échouée : " . $conn->connect_error);
}

// Récupérer l'identifiant du personnel à supprimer
$idpersonnel = $_GET["idpersonnel"];

// Requête SQL pour supprimer l'enregistrement correspondant
$sql = "DELETE FROM personnel WHERE idpersonnel = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idpersonnel);
$stmt->execute();

// Vérifier si la suppression a réussi
if ($stmt->affected_rows > 0) {
  echo "L'enregistrement a été supprimé avec succès.";
} else {
  echo "Une erreur s'est produite lors de la suppression de l'enregistrement.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
