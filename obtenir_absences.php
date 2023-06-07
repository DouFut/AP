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

// Récupérer l'identifiant du personnel depuis la requête GET
$idpersonnel = $_GET["idpersonnel"];

// Requête SQL pour récupérer les absences du personnel
$sql = "SELECT idabsence, idpersonnel, datedebut, datefin FROM absence WHERE idpersonnel = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idpersonnel);
$stmt->execute();
$result = $stmt->get_result();

// Tableau pour stocker les absences
$absences = array();

// Récupérer les absences du résultat de la requête
while ($row = $result->fetch_assoc()) {
  $absence = array(
    "idabsence" => $row["idabsence"],
    "idpersonnel" => $row["idpersonnel"],
    "datedebut" => $row["datedebut"],
    "datefin" => $row["datefin"]
  );
  // Ajouter l'absence au tableau
  $absences[] = $absence;
}

// Fermeture de la connexion à la base de données
$conn->close();

// Renvoyer les absences au format JSON
header("Content-Type: application/json");
echo json_encode($absences);
?>
