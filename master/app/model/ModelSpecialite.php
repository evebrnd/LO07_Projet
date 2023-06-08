<!-- ----- debut ModelPersonne -->
<?php
require_once 'Model.php';

class ModelSpecialite
{
    // Variables de la classe
    private $id, $label;

    public function __construct($id = NULL, $label = NULL)
    {
        // Valeurs nulles si aucun passage de paramètres
        if (!is_null($id)) {
            $this->id = $id;
            $this->$label = $label;
        }
    }

    // ------ Getter et Setter
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLabel($label)
    {
        $this->label = $label;
    }



    // ------ Fonctions du modèle
    // ---- Récupère la liste des spécialités
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Récupère les id des spécialités
    public static function getAllId()
    {
        try {
            $database = Model::getInstance();
            $query = "select id from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Récupère le/les tuple/s specialite qui correspondent à l'id donné
    public static function getOne($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // ---- Insère un tuple specialite à la fin de la base de données
    public static function insert($label)
    {
        try {
            $database = Model::getInstance();

            // Recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from specialite";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // Ajout d'un nouveau tuple
            $query = "insert into specialite value (:id, :label)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}
?>

<!-- ----- fin ModelRendezVous -->