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

// Récupérer les données soumises depuis le formulaire
$idpersonnel = $_POST["idpersonnel"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];

// Requête SQL pour mettre à jour les informations du personnel
$sql = "UPDATE personnel SET nom = ?, prenom = ?, email = ?, telephone = ? WHERE idpersonnel = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $nom, $prenom, $email, $telephone, $idpersonnel);

// Exécuter la requête
if ($stmt->execute()) {
  echo "Les informations du personnel ont été mises à jour avec succès.";
} else {
  echo "Une erreur s'est produite lors de la mise à jour des informations du personnel.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
