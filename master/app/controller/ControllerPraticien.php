<!-- ----- debut ControllerPraticien-->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerPraticien
{

    public static function praticienViewDisponibilite()
    {
        // Quand la connexion sera opérationnelle, il faut imaginer une variable temp avec les carac de l'utilisateur loggé 
        // A la place de ce qu'il y a actuellement on ferait un temp->getId()

        // TEST avec le tuple suivant
        //50, "PASTEUR", "Louis", "Paris", "pasteur", "secret", 1, 1
        $results = ModelRendezVous::getDispo(50);

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewListDisponibilite.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
        require($vue);
    }

    public static function praticienViewMyRdv()
    {
        // Quand la connexion sera opérationnelle, il faut imaginer une variable temp avec les carac de l'utilisateur loggé 
        // A la place de ce qu'il y a actuellement on ferait un temp->getId()

        // TEST avec le tuple suivant
        //50, "PASTEUR", "Louis", "Paris", "pasteur", "secret", 1, 1
        $results = ModelRendezVous::getMyRdv(50);
        $patients = array();
        foreach ($results as $patientRdv) {
            $index = $patientRdv->getPatientId();
            $rdv_date = $patientRdv->getRdvDate();
            $patients[$index] = ModelPersonne::getOneId($index);
        }

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewRdvWithPatient.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewRdvWithPatient : vue = $vue");
        require($vue);
    }


    public static function praticienViewPatients()
    {
        // TEST avec le tuple suivant
        //50, "PASTEUR", "Louis", "Paris", "pasteur", "secret", 1, 1
        $results = ModelRendezVous::getMyRdv(50);
        $patients = array();
        foreach ($results as $patientRdv) {
            $index = $patientRdv->getPatientId();
            $patients[$index] = ModelPersonne::getOneId($index);
        }

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewListOfPatients.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewListOfPatients : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerPraticien -->