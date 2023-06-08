<!-- ----- debut ControllerDoctolib -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerDoctolib
{

   public static function doctolibAccueil()
   {
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }
      include 'config.php';
      $vue = $root . '/app/view/viewDoctolibAccueil.php';
      if (DEBUG)
         echo ("ControllerDoctolib : DoctolibAccueil : vue = $vue");
      require($vue);
   }

   public static function propositionsFonctionnalites()
   {
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }
      include 'config.php';
      $vue = $root . '/app/view/viewPropositionsFonctionnalites.php';
      if (DEBUG)
         echo ("ControllerDoctolib : mesPropositions : vue = $vue");
      require($vue);
   }


   // -- FONCTIONS DE CONNEXION
   public static function connexionLogin()
   {
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }
      include 'config.php';
      $vue = $root . '/app/view/site/viewConnexion.php';
      if (DEBUG)
         echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
      require($vue);
   }

   public static function connexionLogge()
   {
      session_start();
      $result = ModelPersonne::checkIdentifiers($_GET['login'], $_GET['password']);
      
      if ($result != null) {
         $_SESSION['login'] = $_GET['login'];

         $tempUser = ModelPersonne::getOneLogin($_SESSION['login']);
      } else {
         header('Location: router.php?action=connexionError');
         exit();
      }

      include 'config.php';
      $vue = $root . '/app/view/viewDoctolibAccueil.php';
      if (DEBUG)
         echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
      require($vue);
   }

   public static function connexionError()
   {
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }
      include 'config.php';
      $vue = $root . '/app/view/site/viewConnexionError.php';
      if (DEBUG)
         echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
      require($vue);
   }

   public static function deconnexion()
   {
      session_start();
      $_SESSION['login'] = 'NULL';

      include 'config.php';
      $vue = $root . '/app/view/viewDoctolibAccueil.php';
      if (DEBUG)
         echo ("ControllerDoctolib : doctolibDeconnexion : vue = $vue");
      require($vue);
   }
}
?>
<!-- ----- fin ControllerDoctolib -->