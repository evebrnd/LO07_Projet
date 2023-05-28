<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerAdmin
{


    // --- Liste des specialite
    public static function speReadAll()
    {
        $results = ModelSpecialite::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewAllSpecialite.php';
        if (DEBUG)
            echo ("ControllerAdmin : speReadAll : vue = $vue");
        require($vue);
    }

    
}
?>
<!-- ----- fin ControllerAdministrateur -->