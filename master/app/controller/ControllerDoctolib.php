
<!-- ----- debut ControllerDoctolib -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerDoctolib {

 public static function doctolibAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerDoctolib : DoctolibAccueil : vue = $vue");
  require ($vue);
 }

 public static function propositionsFonctionnalites() {
    include 'config.php';
    $vue = $root . '/app/view/viewPropositionsFonctionnalites.php';
    if (DEBUG)
     echo ("ControllerDoctolib : mesPropositions : vue = $vue");
    require ($vue);
   }

}
?>
<!-- ----- fin ControllerDoctolib -->


