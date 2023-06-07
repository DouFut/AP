<?phpheader('Content-Type: text/html; charset=utf-8'); ?>

<html>
<head>
  <title>Liste du personnel</title>
  <link rel="stylesheet" href="css/personnel.css">
  <script src="js/ajPer.js"></script>
  <script src="js/modifPer.js"></script>
  <script src="js/suppressionPersonnel"></script>
  <meta charset="utf-8">
</head>
<div id="container">
    <!-- Barre de Navigation -->
    <nav>
    <div class="onglets">
            <a href="">Home</a>
        </div>
        <div class="onglets">
            <a href="Abs.php">Absence</a>
        </div>

    </nav>
    <!-- Fin Barre de Navigation -->
<H1>
  Liste du Personnel
</H1>
<h2><a href="javascript:void(0)" onclick="ouvrirFormulaire()">Ajouter Personnel</a></h2>
<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Email</th>
      <th>Tel</th>
      <th></th>
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
    $sql = "SELECT idpersonnel, nom, prenom, email, telephone FROM personnel";
    $result = $conn->query($sql);

    // Affichage des données dans le tableau
    if ($result !== false && $result->num_rows > 0) {
      // Affichage des données dans le tableau
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nom"] . "  " . $row["prenom"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        // Vérifier si la clé "tel" existe avant d'y accéder
        if (isset($row["telephone"])) {
          echo "<td>" . $row["telephone"] . "</td>";
        } else {
          echo "<td></td>";
        }
        echo "<td><a class='a' href=''>Afficher</a>
              <a class='modifier' href='javascript:void(0)' onclick='ouvrirModification(" . $row["idpersonnel"] . ")'>Modifier</a>
              <a class='supprimer' href='javascript:void(0)' onclick='suppressionPersonnel(" . $row["idpersonnel"] . ")'>Supprimer</a></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>Aucun enregistrement trouvé.</td></tr>" ;
    }
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Récupérer les données soumises depuis le formulaire
      $nom = $_POST["nom"];
      $prenom = $_POST["prenom"];
      $email = $_POST["email"];
      $telephone = $_POST["telephone"];
    
      // Requête SQL pour insérer le nouveau personnel dans la base de données
      $sql = "INSERT INTO personnel (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)";
      
      // Préparer la requête
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssss", $nom, $prenom, $email, $telephone);
      
      // Exécuter la requête
      if ($stmt->execute()) {
        echo "Le personnel a été ajouté avec succès.";
      } else {
        echo "Une erreur s'est produite lors de l'ajout du personnel.";
      }
    }
    
    // Fermeture de la connexion à la base de données
    $conn->close();
    ?>
  </tbody>
</table>

  </div>