<!-- ----- debut router -->
<?php
require('../controller/ControllerAdmin.php');
require('../controller/ControllerPraticien.php');
require('../controller/ControllerPatient.php');
require('../controller/ControllerDoctolib.php');
require('../controller/ControllerConnexion.php');

// --- Récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// Construire d'une table de hachage (clé + valeur)
parse_str($query_string, $param);

$action = htmlspecialchars($param["action"]);
$action = $param['action'];
unset($param['action']);
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
  case "speReadAll":
  case "speReadOne":
  case "speReadId":
  case "speCreate":
  case "speCreated":
  case "readAllPraticien":
  case "nombrePraticienParPatient":
  case "infoOnAll":
    ControllerAdmin::$action($args);
    break;

  case "praticienViewDisponibilite":
  case "praticienViewPatients":
  case "praticienViewMyRdv":
  case "praticienAjoutRdv":
  case "praticienRdvAjoute":
    ControllerPraticien::$action($args);
    break;

  case "patientViewMonCompte":
  case "patientViewRdv":
  case "patientChoixPraticien":
  case "patientReadId":
  case "patientUpdateRdv":
    ControllerPatient::$action($args);
    break;

  case "propositionsFonctionnalites":
  case "connexionLogin":
  case "connexionLogge":
  case "deconnexion":
  case "connexionError":
    ControllerDoctolib::$action();
    break;

  default:
    $action = "doctolibAccueil";
    ControllerDoctolib::$action();
}
?>
<!-- ----- Fin router -->