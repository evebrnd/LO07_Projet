<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelPersonne
{
    const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;
    private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id;

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

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getSpecialiteId()
    {
        return $this->specialite_id;
    }

    public function setSpecialiteId($specialite_id)
    {
        $this->specialite_id = $specialite_id;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }



    // ------ Fonctions de la classe
    // permet d'avoir l'id et la spécialité
    /*
    public static function getSpecialite()
    {
        try {
            $database = Model::getInstance();
            $query = "select id, specialite from doctolib_base";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    // pour selectionner un id
    public static function getOne($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from doctolib_base where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    */

    public static function getAllAdmin()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut=0 AND id>0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllPraticien()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut=1 AND id>0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllPatient()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut=2 AND id>0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>
<!-- ----- fin ModelPersonne -->