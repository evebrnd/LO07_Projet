<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';
class ModelRendezVous
{
    private $id,$patient_id, $praticien_id,$rdv_date;

    public function __construct($id = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL)
    {
        // Valeurs nulles si aucun passage de paramètres
        if (!is_null($id)) {
            $this->id = $id;
            $this->$patient_id = $patient_id;
            $this->$praticien_id = $praticien_id;
            $this->$rdv_date = $rdv_date;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getPatientId()
    {
        return $this->patient_id;
    }

    public function setPatientId($patient_id): void
    {
        $this->patient_id = $patient_id;
    }

    public function getPraticienId()
    {
        return $this->praticien_id;
    }

    public function setPraticienId($praticien_id): void
    {
        $this->praticien_id = $praticien_id;
    }

    public function getRdvDate()
    {
        return $this->rdv_date;
    }

    public function setRdvDate($rdv_date): void
    {
        $this->rdv_date = $rdv_date;
    }
}
?>


<!-- ----- fin ModelRendezVous -->