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
        $results = ModelRendezVous::getRdvPatient(201);
        

        include 'config.php';
        $vue = $root . '/app/view/patient/viewMesRdv.php';
        if (DEBUG)
            echo ("ControllerPatient : viewMonCompte : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerPatient -->


