<!-- ----- debut ControllerPraticien-->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerPraticien
{

    public static function praticienViewDisponibilite()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelRendezVous::getDispo($tempUser->getId());

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewListDisponibilite.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
        require($vue);
    }

    public static function praticienViewMyRdv()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelRendezVous::getMyRdv($tempUser->getId());
        $patients = array();
        foreach ($results as $patientRdv) {
            $rdv_date = $patientRdv->getRdvDate();
            $patients[$rdv_date] = ModelPersonne::getOneId($patientRdv->getPatientId());
        }
    
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewRdvWithPatient.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewRdvWithPatient : vue = $vue");
        require($vue);
    }
    


    public static function praticienViewPatients()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelRendezVous::getMyRdv($tempUser->getId());
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
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        // $results = ModelRendezVous::ajoutDispo("50",$creneau);

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsertDispo.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewInsertDispo : vue = $vue");
        require($vue);
    }

    public static function praticienRdvAjoute() {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        // ajouter une validation des informations du formulaire
        $praticien_id = $tempUser->getId();
        $rdv_date=htmlspecialchars($_GET['rdv_date']);
        $rdv_nombre=htmlspecialchars($_GET['rdv_nombre']);
        date_default_timezone_set('Europe/Paris');
        $heureDeBase = new DateTime($rdv_date . '10:00:00');
        $formattedDate = $heureDeBase->format('Y-m-d H\hi');

        foreach (range(1, $rdv_nombre) as $index) {
            $creneau = $heureDeBase->format('Y-m-d H\hi');
            $creneaux[] = $creneau;
            $heureDeBase->add(new DateInterval('PT1H'));
            $results = ModelRendezVous::ajoutDispo($praticien_id,$creneau);
        }
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsertedDispo.php';
        require ($vue);
       }
}
?>
<!-- ----- fin ControllerPraticien -->