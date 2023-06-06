<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';
class ModelRendezVous
{
    private $id, $patient_id, $praticien_id, $rdv_date;

    public function __construct($id = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL)
    {
        // Valeurs nulles si aucun passage de paramètres
        if (!is_null($id)) {
            $this->id = $id;
            $this->patient_id = $patient_id;
            $this->praticien_id = $praticien_id;
            $this->rdv_date = $rdv_date;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPatientId()
    {
        return $this->patient_id;
    }

    public function setPatientId($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    public function getPraticienId()
    {
        return $this->praticien_id;
    }

    public function setPraticienId($praticien_id)
    {
        $this->praticien_id = $praticien_id;
    }

    public function getRdvDate()
    {
        return $this->rdv_date;
    }

    public function setRdvDate($rdv_date)
    {
        $this->rdv_date = $rdv_date;
    }



    public static function getAllRdv()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezVous");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMyRdv($id) {
        try {
         $database = Model::getInstance();
         
         $query = "select * from rendezvous where praticien_id = :id AND patient_id>0";
         $statement = $database->prepare($query);
         $statement->execute([
           'id' => $id
         ]);
         $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezVous");
         
         return $results;
        } catch (PDOException $e) {
         printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
         return NULL;
        }
       }


    public static function getNombreParPatient()
    {
        try {
            $database = Model::getInstance();
            $query = "select patient_id, count(praticien_id) as rendezvous_count from rendezvous where patient_id > 0 group by patient_id";
            $statement = $database->prepare($query);
            $statement->execute();
            //$results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $results = array();
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $patientId = $row['patient_id'];
                $count = $row['rendezvous_count'];
                // add to $results
                $results[$patientId] = $count;
            }

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    public static function getDispo($index)
    {
        try {
            $database = Model::getInstance();

            $query = "select * from rendezvous where praticien_id = :index and patient_id=0";
            $statement = $database->prepare($query);
            $statement->execute([
                'index' => $index
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezVous");

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function ajoutDispo ($praticien_id, $rdv_date)
    {
        try {
            $database = Model::getInstance();

            $query = "SELECT MAX(id) AS last_id FROM rendezvous";
            $statement = $database->prepare($query);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $last_id = $result['last_id'];
            $new_id = $last_id + 1;
    

            $query = "INSERT INTO `rendezvous` (`id`, `patient_id`, `praticien_id`, `rdv_date`) VALUES
            (:id, 0, :praticien_id, :rdv_date)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $new_id,
                'praticien_id' => $praticien_id,
                'rdv_date' => $rdv_date
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezVous");

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getRdvPatient($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous where patient_id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezVous");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }  
    }

    public static function getChoixPraticien()
    {
        try {
            $database = Model::getInstance();
            $query = "select distinct praticien_id from rendezvous";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezVous");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function updateRdv($patient_id, $rdv_date, $praticien_id)
    {
        try {
            $database = Model::getInstance();
            // Vérification des paramètres
            if (!is_numeric($patient_id) || !is_numeric($praticien_id)) {
                throw new Exception("Les identifiants patient et praticien doivent être des nombres.");
            }
            $query = "UPDATE rendezvous SET patient_id = :patient_id WHERE rdv_date= :rdv_date and praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'patient_id'=> $patient_id,
                'rdv_date' => $rdv_date,
                'praticien_id'=> $praticien_id
            ]);

            // Effectuer une requête SELECT pour récupérer les données mises à jour
            $query = "SELECT * FROM rendezvous WHERE rdv_date = :rdv_date AND praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'rdv_date' => $rdv_date,
                'praticien_id' => $praticien_id
            ]);

            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRendezVous");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
        
    }

?>



<!-- ----- fin ModelRendezVous -->