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

// Récupérer l'identifiant du personnel
$idpersonnel = $_GET["idpersonnel"];

// Requête SQL pour récupérer les détails du personnel
$sql = "SELECT idpersonnel, nom, prenom, email, telephone FROM personnel WHERE idpersonnel = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idpersonnel);
$stmt->execute();
$result = $stmt->get_result();

// Vérifier si des résultats ont été trouvés
if ($result !== false && $result->num_rows > 0) {
  // Récupérer les détails du personnel
  $personnel = $result->fetch_assoc();
  // Convertir les détails en JSON et renvoyer la réponse
  header("Content-Type: application/json");
  echo json_encode($personnel);
} else {
  // Aucun enregistrement trouvé
  echo "Aucun enregistrement trouvé.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
