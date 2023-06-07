<?php

class BddManager
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        $servername = "localhost"; // Adresse du serveur
        $username = "id18236452_localhost"; // Nom d'utilisateur par défaut pour WampServer
        $password = "Judo10400%"; // Mot de passe par défaut pour WampServer
        $dbname = "id18236452_db"; // Nom de votre base de données PHPMyAdmin

        // Connexion à la base de données
        $this->connection = new mysqli($servername, $username, $password, $dbname);

        // Vérification de la connexion
        if ($this->connection->connect_error) {
            die("Échec de la connexion : " . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new BddManager();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function executeQuery($query)
    {
        $result = $this->connection->query($query);

        if (!$result) {
            die("Erreur lors de l'exécution de la requête : " . $this->connection->error);
        }

        return $result;
    }

    // Autres méthodes nécessaires pour l'accès à la base de données
    // ...

    public function closeConnection()
    {
        $this->connection->close();
    }
}
?>
