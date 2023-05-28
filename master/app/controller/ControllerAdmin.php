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

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function speReadId($args)
    {
        $results = ModelSpecialite::getAllId();

        $target = $args['target'];
        if (DEBUG) echo ("ControllerSpecialite:speReadId: target = $target</br>");

        include 'config.php';
        $vue = $root . '/app/view/admin/viewId.php';
        require($vue);
    }



    // Affiche une spe particulière (id)
    public static function speReadOne()
    {
        $spe_id = $_GET['id'];
        $results = ModelSpecialite::getOne($spe_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/viewAllSpecialite.php';
        require($vue);
    }
}
?>
<!-- ----- fin ControllerAdministrateur -->