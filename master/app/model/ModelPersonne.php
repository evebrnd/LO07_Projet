<!-- ----- debut ModelPersonne -->
<?php
require_once 'Model.php';

class ModelPersonne
{
    // Variables de la classe
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
    // ---- Récupère la liste des administrateurs
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

    // ---- Récupère la liste des praticiens
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

    // ---- Récupère la liste des patients
    public static function getAllPatient()
    {
        try {
            $database = Model::getInstance();
            $query = "select distinct * from personne where statut=2 AND id>0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Récupère le tuple personne qui correspond à l'id donné
    public static function getOneId($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results[0];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Récupère le tuple personne qui correspond au login donné
    public static function getOneLogin($login)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where login = :login";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results[0];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Récupère le tuple patient qui correspond à l'id donné
    public static function getAllForPatient($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut=2 and id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Vérifie que les identifiants donnés existent dans la base de donnés
    public static function checkIdentifiers($login, $password)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where login = :login AND password= :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login, 
                'password' => $password
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results[0];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Vérifie que le login donné n'existe pas déjà dans la base de données
    public static function checkLogin($login)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where login = :login";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Insère un tuple personne à la fin de la base de données
    public static function insert($nom, $prenom, $adresse, $login, $password, $statut, $specialite_id)
    {
        try {
            $database = Model::getInstance();

            // Recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from personne";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // Ajout d'un nouveau tuple
            $query = "insert into personne value (:id, :nom, :prenom, :adresse, :login, :password, :statut, :specialite_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse,
                'login' => $login,
                'password' => $password,
                'statut' => $statut,
                'specialite_id' => $specialite_id
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    // ---- supprime un tuple personne qui correspond au login donné
    public static function delete($login)
    {
        try {
            $database = Model::getInstance();

            // suppression d'un tuple
            $query = "delete from personne where login = :login";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login
            ]);
            $_SESSION['login']='NULL';
            return 1;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

        // ---- récupère l'id d'une personne a partir de son nom et son prénom
    public static function id($nom, $prenom)
    {
        try {
            $database = Model::getInstance();

            // suppression d'un tuple
            $query = "select id from personne where nom = :nom and prenom = :prenom";
            $statement = $database->prepare($query);
            $statement->execute([
                'nom' => $nom,
                'prenom' => $prenom

            ]);
            $id = $statement->fetch(PDO::FETCH_ASSOC);
            return $id['id'];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}
?>
<!-- ----- fin ModelPersonne -->