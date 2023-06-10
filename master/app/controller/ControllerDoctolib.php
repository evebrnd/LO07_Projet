<!-- ----- debut ControllerDoctolib -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezVous.php';

class ControllerDoctolib
{

   // ---- Affiche la page d'accueil
   public static function doctolibAccueil()
   {
      // Récupération des données de l'user connecté
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewDoctolibAccueil.php';
      if (DEBUG)
         echo ("ControllerDoctolib : DoctolibAccueil : vue = $vue");
      require($vue);
   }



   // ---- Affiche les propositions d'améliorations
   public static function propositionsFonctionnalites()
   {
      // Récupération des données de l'user connecté
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewPropositionsFonctionnalites.php';
      if (DEBUG)
         echo ("ControllerDoctolib : propositionsFonctionnalites : vue = $vue");
      require($vue);
   }




   // ------- FONCTIONS DE CONNEXION -------

   // ---- Affiche le formulaire de connexion Log In
   public static function connexionLogin()
   {
      // Récupération des données de l'user connecté
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/site/viewConnexion.php';
      if (DEBUG)
         echo ("ControllerDoctolib : connexionLogin : vue = $vue");
      require($vue);
   }



   // ---- Affiche le résultat de la tentative de connexion
   public static function connexionLogge()
   {
      // Vérifications des identifiants
      session_start();
      $loginResults = ModelPersonne::checkIdentifiers($_GET['login'], $_GET['password']);

      // Bons identifiants
      if ($loginResults != null) {
         $_SESSION['login'] = $_GET['login'];
         $tempUser = ModelPersonne::getOneLogin($_SESSION['login']);
      } 
      // Identifiants erronés
      else {
         header('Location: router.php?action=connexionError');
         exit();
      }

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewDoctolibAccueil.php';
      if (DEBUG)
         echo ("ControllerDoctolib : connexionLogge : vue = $vue");
      require($vue);
   }



   // ---- Affiche le résultat d'une connexion ratée
   public static function connexionError()
   {
      // Récupération des données de l'user connecté
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/site/viewConnexionError.php';
      if (DEBUG)
         echo ("ControllerDoctolib : connexionError : vue = $vue");
      require($vue);
   }



   // ---- Déconnexion de l'user : affichage de la page d'accueil
   public static function deconnexion()
   {
      // Récupération des données de l'user connecté
      session_start();
      $_SESSION['login'] = 'NULL';

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewDoctolibAccueil.php';
      if (DEBUG)
         echo ("ControllerDoctolib : deconnexion : vue = $vue");
      require($vue);
   }



   
   // ---- Inscription : affiche le formulaire d'inscription
   public static function inscription()
   {
      // Récupération des données de l'user connecté
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }

      $results = ModelSpecialite::getAll();

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/site/viewInscription.php';
      if (DEBUG)
         echo ("ControllerDoctolib : viewInscription : vue = $vue");
      require($vue);
   }



   // ---- Inscription : affiche le résultat de la tentative d'inscription
   public static function inscriptionLogge()
   {
      // Vérifications des identifiants
      session_start();
      if ($_SESSION['login'] != 'NULL') {
            $login = $_SESSION['login'];
            $tempUser = ModelPersonne::getOneLogin($login);
         }
      $signInResults = ModelPersonne::checkLogin($_GET['login']);

      // Bons identifiants
      if ($signInResults == null) {
         $index = ModelPersonne::insert($_GET['nom'], $_GET['prenom'], $_GET['adresse'], $_GET['login'], $_GET['password'], $_GET['statut'], $_GET['specialite']);
         $path = '/app/view/viewDoctolibAccueil.php';
      }
      // Identifiants erronés
      else {
         $results = ModelSpecialite::getAll();
         $path = '/app/view/site/viewInscriptionError.php';
      }

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . $path;
      if (DEBUG)
         echo ("ControllerDoctolib : viewInscriptionError : vue = $vue");
      require($vue);
   }



   // ---- Inscription : affiche le résultat de la tentative d'inscription
   public static function inscriptionError()
   {
      // Vérifications des identifiants
      session_start();


      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/viewInscriptionError.php';
      if (DEBUG)
         echo ("ControllerDoctolib : viewInscriptionError : vue = $vue");
      require($vue);
   }

   // ---- Inscription : affiche le formulaire d'inscription

   public static function desinscriptionForm()
   {
      // Récupération des données de l'user connecté
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
         $path = '/app/view/site/viewDesinscription.php';
      }
      else {
         $path = '/app/view/site/viewDesinscriptionError.php';
      }

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . $path;
      if (DEBUG)
         echo ("ControllerDoctolib : viewDesinscription : vue = $vue");
      require($vue);
   }
   public static function desinscription()
   {
      // Récupération des données de l'user connecté
      session_start();
      if ($_SESSION['login'] != 'NULL') {
         $login = $_SESSION['login'];
         $tempUser = ModelPersonne::getOneLogin($login);
      }

      $results = ModelPersonne::delete($login);

      // Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/app/view/site/viewDesinscriptionFaite.php';
      if (DEBUG)
         echo ("ControllerDoctolib : viewDesinscriptionFaite : vue = $vue");
      require($vue);
   }
}
?>
<!-- ----- fin ControllerDoctolib -->