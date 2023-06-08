<!-- ----- debut ControllerPraticien-->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerPraticien
{
    // ---- Affiche les disponibilités du praticien
    public static function praticienViewDisponibilite()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelRendezVous::getDispo($tempUser->getId());

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewListDisponibilite.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
        require($vue);
    }



    // ---- Ajout d'une disponibilité : affiche le formulaire de choix de date et nombre
    public static function praticienAjoutRdv()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsertDispo.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewInsertDispo : vue = $vue");
        require($vue);
    }



    // ---- Ajout d'une disponibilité : affiche le résultat de l'ajout
    public static function praticienRdvAjoute()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        // Récupération des informations du créneau
        $praticien_id = $tempUser->getId();
        $rdv_date = htmlspecialchars($_GET['rdv_date']);
        $rdv_nombre = htmlspecialchars($_GET['rdv_nombre']);
        // Parsage des données
        date_default_timezone_set('Europe/Paris');
        $heureDeBase = new DateTime($rdv_date . '10:00:00');
        $formattedDate = $heureDeBase->format('Y-m-d H\hi');

        // Ajout des créneaux dans la base de données
        foreach (range(1, $rdv_nombre) as $index) {
            $creneau = $heureDeBase->format('Y-m-d H\hi');
            $creneaux[] = $creneau;
            $heureDeBase->add(new DateInterval('PT1H'));
            $results = ModelRendezVous::ajoutDispo($praticien_id, $creneau);
        }

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsertedDispo.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewInsertedDispo : vue = $vue");
        require($vue);
    }


    
    // ---- Affiche les rendez-vous du praticien
    public static function praticienViewMyRdv()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        // Récupération des rendez-vous du praticien
        $results = ModelRendezVous::getMyRdv($tempUser->getId());
        $patients = array();
        // Insertion des informations du patient associé à chaque rendez-vous
        foreach ($results as $patientRdv) {
            $rdv_date = $patientRdv->getRdvDate();
            $patients[$rdv_date] = ModelPersonne::getOneId($patientRdv->getPatientId());
        }

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewRdvWithPatient.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewRdvWithPatient : vue = $vue");
        require($vue);
    }



    // ---- Affiche la liste des patients sans doublon
    public static function praticienViewPatients()
    {
        // Récupération des données de l'user connecté
        session_start();
        $login = $_SESSION['login'];
        $tempUser = ModelPersonne::getOneLogin($login);

        $results = ModelRendezVous::getMyRdv($tempUser->getId());
        $patients = array();
        foreach ($results as $patientRdv) {
            $index = $patientRdv->getPatientId();
            $patients[$index] = ModelPersonne::getOneId($index);
        }

        // Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewListOfPatients.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewListOfPatients : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerPraticien -->