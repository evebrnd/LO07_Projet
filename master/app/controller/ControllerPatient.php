<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerPatient
{
    // ---- Affiche les infos du compte patient
    public static function patientViewMonCompte()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelPersonne::getAllForPatient($tempUser->getId());

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewMonCompte.php';
        if (DEBUG)
            echo ("ControllerPatient : viewMonCompte : vue = $vue");
        require($vue);
    }



    // ---- Affiche les rendez-vous du patient
    public static function patientViewRdv()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        // Récupération des rendez-vous du patient
        $results = ModelRendezVous::getMyRdvPatient($tempUser->getId());
        $patients = array();
        // Insertion des informations du praticien associé à chaque rendez-vous
        foreach ($results as $patientRdv) {
            $index = $patientRdv->getPraticienId();
            $rdv_date = $patientRdv->getRdvDate();
            $patients[$rdv_date] = ModelPersonne::getOneId($index);
        }

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewMesRdv.php';
        if (DEBUG)
            echo ("ControllerPatient : viewMesRdv : vue = $vue");
        require($vue);
    }



    // ---- Prise de rendez-vous : affiche le formulaire de choix du praticien
    public static function patientChoixPraticien()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelRendezVous::getChoixPraticien();

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewChoixPraticien.php';
        if (DEBUG)
            echo ("ControllerPatient : viewChoixPraticien : vue = $vue");
        require($vue);
    }



    // ---- Prise de rendez-vous : récupère les disponibilités du praticien et les affiche
    public static function patientReadId()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        //Récupération des disponibilités du praticien avec l'id récupéré
        $praticien_id = $_GET['praticien_id'];
        $results = ModelRendezVous::getDispo($praticien_id);
        echo "<input type='hidden' name='praticien_id' value='$praticien_id'>";

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewChoixDate.php';
        include($vue);
    }



    // ---- Modification d'un rendez-vous
    public static function patientUpdateRdv()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $rdv_date = $_GET['rdv_date'];
        $praticien_id = intval($_GET['praticien_id']);
        $results = ModelRendezVous::updateRdv($tempUser->getId(), $rdv_date, $praticien_id);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRdvPris.php';
        include($vue);
    }
}
?>
<!-- ----- fin ControllerPatient -->