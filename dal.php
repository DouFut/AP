<?php

class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;

    protected function __construct()
    {
        $this->host = "localhost"; // Adresse du serveur
        $this->username = "root"; // Nom d'utilisateur par défaut pour WampServer
        $this->password = ""; // Mot de passe par défaut pour WampServer
        $this->dbname = "nom_de_la_base_de_donnees"; // Nom de votre base de données PHPMyAdmin
    }

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new static();
        }
        return $instance;
    }

    public function getConnectionString()
    {
        return "mysql:host={$this->host};dbname={$this->dbname}";
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
?>
