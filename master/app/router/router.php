<!-- ----- debut router2 -->
<?php
require('../controller/ControllerAdmin.php');
require('../controller/ControllerPraticien.php');
require('../controller/ControllerPatient.php');
require('../controller/ControllerDoctolib.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// Modification du routeur pour prendre en compte l'ensemble des paramètres
$action = $param['action'];

// --- On supprime l'élément action de la structure
unset($param['action']);

// --- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
  case "speReadAll":
  case "speReadOne":
  case "speReadId":
  case "speCreate":
  case "speCreated":
  case "speDelete":
    ControllerAdmin::$action($args);
    break;

  case "praticienReadAll":
  case "praticienReadOne":
  case "praticienReadId":
  case "praticienCreate":
  case "praticienCreated":
  case "praticienListeRegions":
  case "praticienNombreParRegion":
  case "praticienDelete":
    //ControllerPraticien::$action($args);
    break;

  case "recolte":
  case "recolte2":
  case "ajoutRecolte":
  case "recolteInserted":
    //ControllerPatient::$action();
    break;

  case "propositionsFonctionnalites":
    ControllerDoctolib::$action();
    break;

  default:
    $action = "doctolibAccueil";
    ControllerDoctolib::$action();
}
?>
<!-- ----- Fin router2 -->