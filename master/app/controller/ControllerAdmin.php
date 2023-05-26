<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerAdmin {
    
    // --- Liste des specialités
    public static function adminReadAll() {
        $results = ModelVin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/view?.php';           //faut créer la vue
        if (DEBUG)
         echo ("ControllerAdmin : adminReadAll : vue = $vue");
        require ($vue);
    }
    
     // Affiche une spécialité particuliere (id)
    public static function adminReadOne() {
        $personne_id = $_GET['id'];
        $results = ModelPersonne::getOne($personne_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/admin/view?.php';          //faut créer la vue
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerAdministrateur -->


