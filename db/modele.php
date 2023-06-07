<?php

class Personnel
{
    private $idpersonnel;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;

    // Constructeur
    public function __construct($idpersonnel, $nom, $prenom, $email, $telephone)
    {
        $this->idpersonnel = $idpersonnel;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    // Getters et setters
    public function getIdPersonnel()
    {
        return $this->idpersonnel;
    }

    public function setIdPersonnel($idpersonnel)
    {
        $this->idpersonnel = $idpersonnel;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
}

class Service
{
    private $idservice;
    private $nom;

    // Constructeur
    public function __construct($idservice, $nom)
    {
        $this->idservice = $idservice;
        $this->nom = $nom;
    }

    // Getters et setters
    public function getIdService()
    {
        return $this->idservice;
    }

    public function setIdService($idservice)
    {
        $this->idservice = $idservice;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }
}

class Absence
{
    private $datedebut;
    private $datefin;

    // Constructeur
    public function __construct($datedebut, $datefin)
    {
        $this->datedebut = $datedebut;
        $this->datefin = $datefin;
    }

    // Getters et setters
    public function getDateDebut()
    {
        return $this->datedebut;
    }

    public function setDateDebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    public function getDateFin()
    {
        return $this->datefin;
    }

    public function setDateFin($datefin)
    {
        $this->datefin = $datefin;
    }
}

class Motif
{
    private $idmotif;
    private $libelle;

    // Constructeur
    public function __construct($idmotif, $libelle)
    {
        $this->idmotif = $idmotif;
        $this->libelle = $libelle;
    }

    // Getters et setters
    public function getIdMotif()
    {
        return $this->idmotif;
    }

    public function setIdMotif($idmotif)
    {
        $this->idmotif = $idmotif;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }
}

?>
