<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nom_de_la_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connexion échouée : " . $conn->connect_error);
}else{
  echo "gg";
}

// Récupérer les données envoyées via la requête POST
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$tel = $_POST["telephone"];

// Effectuer la requête d'insertion dans la base de données
$sql = "INSERT INTO personnel (nom, prenom, email, telephone) VALUES ('$nom', '$prenom', '$email', '$tel')";
if ($conn->query($sql) === TRUE) {
  // L'enregistrement a été ajouté avec succès
  echo "Enregistrement réussi !";
} else {
  // Il y a eu une erreur lors de l'enregistrement
  echo "Erreur lors de l'enregistrement : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
