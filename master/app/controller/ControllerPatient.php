<!-- ----- debut ControllerPatient -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerPatient {
    public static function patientViewMonCompte()
    {
        // TEST avec le tuple suivant
        //(201, "VENTURA", "Lino", "Paris", "ventura", "secret", 2, 0)
        $results = ModelPersonne::getAllForPatient(201);
        

        include 'config.php';
        $vue = $root . '/app/view/patient/viewMonCompte.php';
        if (DEBUG)
            echo ("ControllerPatient : viewMonCompte : vue = $vue");
        require($vue);
    }
    
    public static function patientViewRdv()
    {
        // TEST avec le tuple suivant
        //(201, "VENTURA", "Lino", "Paris", "ventura", "secret", 2, 0)
        $results = ModelRendezVous::getChoixPraticien();

        include 'config.php';
        $vue = $root . '/app/view/patient/viewMesRdv.php';
        if (DEBUG)
            echo ("ControllerPatient : viewMesRdv : vue = $vue");
        require($vue);
    }

    public static function patientChoixPraticien()
    {
        $results = ModelRendezVous::getChoixPraticien();

        include 'config.php';
        $vue = $root . '/app/view/patient/viewChoixPraticien.php';
        if (DEBUG)
            echo ("ControllerPatient : viewChoixPraticien : vue = $vue");
        require($vue);
    }

    public static function patientReadId() {
        $praticien_id = $_GET['praticien_id'];
        // var_dump($_GET['praticien_id']);
        $results = ModelRendezVous::getDispo($praticien_id);
        echo"<input type='hidden' name='praticien_id' value='$praticien_id'>";

      
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewChoixDate.php';
        include ($vue);
       }
    
    public static function patientUpdateRdv()
    {
        // TEST avec le tuple suivant
        //(201, "VENTURA", "Lino", "Paris", "ventura", "secret", 2, 0)
        $rdv_date = $_GET['rdv_date'];
        $praticien_id = intval($_GET['praticien_id']);
        $results = ModelRendezVous::updateRdv(201, $rdv_date, $praticien_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewRdvPris.php';
        include ($vue);
    }
}
?>
<!-- ----- fin ControllerPatient -->


