<!-- ----- debut router2 -->
<?php
require('../controller/ControllerAdmin.php');
require('../controller/ControllerPraticien.php');
require('../controller/ControllerPatient.php');

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
  case "vinReadAll":
  case "vinReadOne":
  case "vinReadId":
  case "vinCreate":
  case "vinCreated":
  case "vinDelete":
    //ControllerVin::$action($args);
    break;

  case "producteurReadAll":
  case "producteurReadOne":
  case "producteurReadId":
  case "producteurCreate":
  case "producteurCreated":
  case "producteurListeRegions":
  case "producteurNombreParRegion":
  case "producteurDelete":
    //ControllerProducteur::$action($args);
    break;

  case "recolte":
  case "recolte2":
  case "ajoutRecolte":
  case "recolteInserted":
    //ControllerRecolte::$action();
    break;

  case "mesPropositions":
    //ControllerCave::$action();
    break;

    // Tache par défaut
  default:
    $action = "caveAccueil";
    //ControllerCave::$action();
}
?>
<!-- ----- Fin router2 -->