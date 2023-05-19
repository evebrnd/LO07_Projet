<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelPersonne {
    public const ADMINISTRATEUR = 0;
    public const PRATICIEN = 1;
    public const PATIENT = 2;
    private $id, $nom, $prenom,$adresse, $login, $password, $statut, $specialite_id;

    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL, $password = NULL, $statut = NULL, $specialite_id = NULL)
    {
        // Valeurs nulles si aucun passage de paramètres
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->login = $login;
            $this->password = $password;
            $this->statut = $statut;
            $this->specialite_id = $specialite_id;
        }
    }

    // ------ Getter et Setter
    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getSpecialiteId()
    {
        return $this->specialite_id;
    }

    public function setSpecialiteId($specialite_id): void
    {
        $this->specialite_id = $specialite_id;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut): void
    {
        $this->statut = $statut;
    }



    // ------ Fonctions de la classe






}
?>
<!-- ----- fin ModelPersonne -->
