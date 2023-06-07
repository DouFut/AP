<?phpheader('Content-Type: text/html; charset=utf-8'); ?>

<html>
<head>
  <title>Absences</title>
  <link rel="stylesheet" href="css/personnel.css">
  <link rel="stylesheet" href="css/Abs.css">
  <script src="js/ajAbs.js"></script>
  <script src="js/afficherAbsences.js"></script>
  <meta charset="utf-8">
</head>
<div id="container">
    <!-- Barre de Navigation -->
    <nav>
    <div class="onglets">
            <a href="">Home</a>
        </div>
        <div class="onglets">
            <a href="personnel.php">Personnel</a>
        </div>

    </nav>
    <!-- Fin Barre de Navigation -->
<H1>
  Liste des Absences
</H1>
<h2><a href="javascript:void(0)" onclick="ouvrirFormulaire()">Ajouter Absences</a></h2>
<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Absences</th>
    </tr>
  </thead>
  <tbody>
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

    // Requête SQL pour récupérer les données du personnel
    $sqlP = "SELECT idpersonnel, nom, prenom, email, telephone FROM personnel";
    $resultP = $conn->query($sqlP);
    $sql = "SELECT idabsence, idpersonnel, datedébut, datefin  FROM absence";
    $result = $conn->query($sql);

    // Affichage des données dans le tableau
    if ($resultP !== false && $resultP->num_rows > 0) {
      // Affichage des données dans le tableau
      while ($row = $resultP->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nom"] . "  " . $row["prenom"] . "</td>";
       echo "<td>
       <a class='gerer' href='' onclick='afficherAbsences(" . $row["idpersonnel"] . ")'>Gérer les Absences</a></td>";
        echo "</tr>";
        }
        
      }
     else {
      echo "<tr><td colspan='4'>Aucun enregistrement trouvé.</td></tr>" ;
    }?>
  </tbody>
</table> 