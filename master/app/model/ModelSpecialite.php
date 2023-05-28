<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';
class ModelSpecialite
{
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

    /*
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $attributes = array_keys($results[0]); // Obtient les noms des attributs
            $data = array(
                'attributes' => $attributes,
                'tuples' => $results
            );
            return $data;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    */

}
?>


<!-- ----- fin ModelRendezVous -->