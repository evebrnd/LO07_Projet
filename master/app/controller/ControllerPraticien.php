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

    public static function praticienAjoutRdv()
    {
        $results = ModelRendezVous::ajoutDispo("50",htmlspecialchars($_GET['rdv_date']));

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsertDispo.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewInsertDispo : vue = $vue");
        require($vue);
    }

    public static function praticienRdvAjoute() {
        // ajouter une validation des informations du formulaire
        $results = ModelRendezVous::ajoutDispo(
            "50",htmlspecialchars($_GET['rdv_date'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsertedDispo.php';
        require ($vue);
       }
}
?>
<!-- ----- fin ControllerPraticien -->