<!-- ----- debut Router1 -->
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

// --- Liste des méthodes autorisées
switch ($action) {
  case "vinReadAll":
  case "vinReadOne":
  case "vinReadId":
  case "vinCreate":
  case "vinCreated":
    //ControllerVin::$action();
    break;

  case "producteurReadAll":
  case "producteurReadOne":
  case "producteurReadId":
  case "producteurCreate":
  case "producteurCreated":
  case "producteurListeRegions":
  case "producteurNombreParRegion":
    //ControllerProducteur::$action();
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
<!-- ----- Fin Router1 -->