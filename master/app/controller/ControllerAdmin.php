<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerAdmin
{


    // --- Liste des spécialités
    public static function speReadAll()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelSpecialite::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewAllSpecialite.php';
        if (DEBUG)
            echo ("ControllerAdmin : speReadAll : vue = $vue");
        require($vue);
    }


    // Affiche un formulaire pour sélectionner un id qui existe
    public static function speReadId($args)
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelSpecialite::getAllId();
        $target = $args['target'];
        if (DEBUG) echo ("ControllerSpecialite:speReadId: target = $target</br>");

        include 'config.php';
        $vue = $root . '/app/view/admin/viewIdSpecialite.php';
        require($vue);
    }


    // Affiche une spe particulière (id)
    public static function speReadOne()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);
        
        $spe_id = $_GET['id'];
        $results = ModelSpecialite::getOne($spe_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewAllSpecialite.php';
        require($vue);
    }

    // Affiche le formulaire de creation d'une spe
    public static function speCreate()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewInsertSpecialite.php';
        require($vue);
    }


    // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function speCreated()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $label = htmlspecialchars($_GET['label']);

        if (!empty($label)) {
            // ajouter une validation des informations du formulaire
            $results = ModelSpecialite::insert($label);
        } else {
            $results = false;
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewInsertedSpecialite.php';
        require($vue);
    }

    // --- Liste des praticiens avec leur spécialité 
    public static function readAllPraticien()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results_praticien = ModelPersonne::getAllPraticien();
        $results_specialite = ModelSpecialite::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewAllPraticien.php';
        if (DEBUG)
            echo ("ControllerAdmin : readAllPraticien : vue = $vue");
        require($vue);
    }

    public static function nombrePraticienParPatient()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results_patient = ModelPersonne::getAllPatient();
        $results_nombre = ModelRendezVous::getNombreParPatient();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewNombreParPatient.php';
        if (DEBUG)
            echo ("ControllerAdmin : nombrePraticienParPatient : vue = $vue");
        require($vue);
    }

    public static function infoOnAll()
    {
        session_start();
        $login=$_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results_spe = ModelSpecialite::getAll();
        $results_admin = ModelPersonne::getAllAdmin();
        $results_praticien = ModelPersonne::getAllPraticien();
        $results_patient = ModelPersonne::getAllPatient();
        $results_rdv = ModelRendezVous::getAllRdv();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewAllInfo.php';
        if (DEBUG)
            echo ("ControllerAdmin : infoOnAll : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerAdministrateur -->