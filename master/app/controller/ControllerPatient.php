<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerPatient
{
    public static function patientViewMonCompte()
    {
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelPersonne::getAllForPatient($tempUser->getId());

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewMonCompte.php';
        if (DEBUG)
            echo ("ControllerPatient : viewMonCompte : vue = $vue");
        require($vue);
    }

    public static function patientViewRdv()
    {
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelRendezVous::getMyRdvPatient($tempUser->getId());
        $patients = array();
        foreach ($results as $patientRdv) {
            $index = $patientRdv->getPraticienId();
            $rdv_date = $patientRdv->getRdvDate();
            $patients[$rdv_date] = ModelPersonne::getOneId($index);
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewMesRdv.php';
        if (DEBUG)
            echo ("ControllerPatient : viewMesRdv : vue = $vue");
        require($vue);
    }

    public static function patientChoixPraticien()
    {
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelRendezVous::getChoixPraticien();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewChoixPraticien.php';
        if (DEBUG)
            echo ("ControllerPatient : viewChoixPraticien : vue = $vue");
        require($vue);
    }

    public static function patientReadId()
    {
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $praticien_id = $_GET['praticien_id'];
        // var_dump($_GET['praticien_id']);
        $results = ModelRendezVous::getDispo($praticien_id);
        echo "<input type='hidden' name='praticien_id' value='$praticien_id'>";

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewChoixDate.php';
        include($vue);
    }

    public static function patientUpdateRdv()
    {
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $rdv_date = $_GET['rdv_date'];
        $praticien_id = intval($_GET['praticien_id']);
        $results = ModelRendezVous::updateRdv($tempUser->getId(), $rdv_date, $praticien_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRdvPris.php';
        include($vue);
    }
}
?>
<!-- ----- fin ControllerPatient -->