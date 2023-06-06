<!-- ----- debut ControllerConnexion -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerConnexion
{
    public static function connexionLogin ()
    {

        include 'config.php';
        $vue = $root . '/app/view/connexion/viewConnexion.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
        require($vue);
    }

    public static function connexionLogge ()
    {
        $login=$_GET['login'];
        $mdp=$_GET['mdp'];
        $results=ModelPersonne::getInfoConnexion($login);
        printf ("<input type='hidden' name='mdp' value='%s'>",$mdp);
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewLogge.php';
        if (DEBUG)
            echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
        require($vue);
    }
}
?>
<!-- ----- fin ControllerConnexion -->