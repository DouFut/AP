<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
  <title>Page de Connexion</title>
  <link rel="stylesheet" href="css/SignIn.css">
  <meta charset="utf-8">
</head>

<body>
  <div id="container">
    <form method="POST" id="form">
      <h1>Page de Connexion</h1>
      <label><b>Nom d'utilisateur ou Email</b></label>
      <input type="text" id="email" name="email" placeholder="Email">
      <label><b>Mot de passe</b></label>
      <input type="password" id="password" name="password" placeholder="Password">
      <input type="submit" value="Se connecter">

      <?php
// Vérifier si le formulaire de connexion a été soumis
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Connexion à la base de données
  $conn = new mysqli('localhost', 'root', '', 'nom_de_la_base_de_donnees');

  // Vérifier la connexion
  if ($conn->connect_error) {
    die('Erreur de connexion à la base de données : ' . $conn->connect_error);
  }

  // Échapper les valeurs pour éviter les injections SQL
  $email = $conn->real_escape_string($email);
  $password = $conn->real_escape_string($password);

  // Construire la requête SQL pour récupérer l'utilisateur correspondant aux informations d'identification
  $sql = "SELECT * FROM responsable WHERE login = '$email' AND pwd = SHA2('$password', 256)";

  // Exécuter la requête
  $result = $conn->query($sql);

  // Vérifier si l'utilisateur existe dans la base de données
  if ($result->num_rows === 1) {
    // Les informations d'identification sont valides, rediriger vers la page protégée
    header('Location: personnel.php');
    exit();
  } else {
    // Les informations d'identification sont invalides, afficher un message d'erreur
   echo "<center><p>Identifiants invalides. Veuillez réessayer.</p></center>";
  }
}
?>
    </form>
  </div>


  
</body>


=======
<!DOCTYPE html>
<html>
<head>
  <title>Liste du personnel</title>
  <link rel="stylesheet" href="SignIn.css">
</head>

<body>
  <div id="container">
    <form method="POST" id="form" action="personnel.html">
      <h1>Page de Connexion</h1>
      <label><b>Nom d'utilisateur ou Email</b></label>
      <input type="text" id="email" name="email" placeholder="Email">
      <label><b>Mot de passe</b></label>
      <input type="password" id="password" name="password" placeholder="Password">
      <input type="submit" value="Se connecter">
      <p>Besoin d'un compte ? <a href="">S'inscrire</a></p>
    </form>
  </div>


  <?php
// Vérifier si le formulaire de connexion a été soumis
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupérer les données du formulaire
  $email = $_POST['email'];
  $password = $_POST['password'];
  // Connexion à la base de données
  $conn = new mysqli('localhost', 'id18236452_localhost', 'Judo10400%', 'id18236452_db');

  // Vérifier la connexion
  if ($conn->connect_error) {
    die('Erreur de connexion à la base de données : ' . $conn->connect_error);
  }

  // Échapper les valeurs pour éviter les injections SQL
  $email = $conn->real_escape_string($email);
  $password = $conn->real_escape_string($password);

  // Construire la requête SQL pour récupérer l'utilisateur correspondant aux informations d'identification
  $sql = "SELECT * FROM responsable WHERE login = '$email' AND pwd = SHA2('$password', 256)";

  // Exécuter la requête
  $result = $conn->query($sql);

  // Vérifier si l'utilisateur existe dans la base de données
  if ($result->num_rows === 1) {
    // Les informations d'identification sont valides, rediriger vers la page protégée
    header('Location: personnel.html');
    exit();
  } else {
    // Les informations d'identification sont invalides, afficher un message d'erreur
   echo 'Identifiants invalides. Veuillez réessayer.';
  }
}
?>
</body>


>>>>>>> 1fba50313a5899629436303f2970b92f756ba68d
