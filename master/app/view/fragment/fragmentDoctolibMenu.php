<!-- ----- début fragmentDoctolibMenu -->

<nav class="navbar navbar-expand-lg bg-primary fixed-top">
  <div class="container-fluid">

    <!-- Barre de navigation -->
    <?php
    if ($_SESSION['login'] === 'NULL') {
      echo ("<a class=\"navbar-brand\" href=\"router.php?action=DoctolibAccueil\">BERNHARD-ROOM||</a>");
    } else {
      $userType = '';
      $userName = $tempUser->getPrenom() . " " . $tempUser->getNom();

      // Affichage différencié selon le type d'utilisateur
      switch ($tempUser->getStatut()) {
        case ModelPersonne::ADMINISTRATEUR:
          $userType = "administrateur";
          break;
        case ModelPersonne::PRATICIEN:
          $userType = "praticien";
          break;
        case ModelPersonne::PATIENT:
          $userType = "patient";
          break;
        default:
          break;
      }

      echo ("<a class=\"navbar-brand\" href=\"router.php?action=DoctolibAccueil\">BERNHARD-ROOM | $userType | $userName</a>");
    }
    ?>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        <?php
        if ($_SESSION['login'] != 'NULL') {
          $menuContent = '';

          // -------- ADMINISTRATEUR -------
          if ($tempUser->getStatut() == ModelPersonne::ADMINISTRATEUR) {
            $menuContent .= '<li class="nav-item dropdown">';
            $menuContent .= '<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>';
            $menuContent .= '<ul class="dropdown-menu">';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=speReadAll">Liste des spécialités</a></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=speReadId&target=speReadOne">Sélection d\'une spécialité par son id</a></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=speCreate">Insertion d\'une nouvelle spécialité</a></li>';
            $menuContent .= '<li role="separator" class="dropdown-divider"></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=readAllPraticien">Liste des praticiens avec leur spécialité</a></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=nombrePraticienParPatient">Nombre de praticiens par patient</a></li>';
            $menuContent .= '<li role="separator" class="dropdown-divider"></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=infoOnAll">Informations</a></li>';
            $menuContent .= '</ul>';
            $menuContent .= '</li>';

            // -------- PRATICIEN --------
          } elseif ($tempUser->getStatut() == ModelPersonne::PRATICIEN) {
            $menuContent .= '<li class="nav-item dropdown">';
            $menuContent .= '<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Praticien</a>';
            $menuContent .= '<ul class="dropdown-menu">';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=praticienViewDisponibilite">Liste de mes disponibilités</a></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=praticienAjoutRdv">Ajout de nouvelles disponibilités</a></li>';
            $menuContent .= '<li role="separator" class="dropdown-divider"></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=praticienViewMyRdv">Liste des rendez-vous avec le nom des patients</a></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=praticienViewPatients">Liste de mes patients (sans doublon)</a></li>';
            $menuContent .= '</ul>';
            $menuContent .= '</li>';

            // -------- PATIENT --------
          } elseif ($tempUser->getStatut() == ModelPersonne::PATIENT) {
            $menuContent .= '<li class="nav-item dropdown">';
            $menuContent .= '<a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Patient</a>';
            $menuContent .= '<ul class="dropdown-menu">';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=patientViewMonCompte">MonCompte</a></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=patientViewRdv">Liste de mes rendez-vous</a></li>';
            $menuContent .= '<li><a class="dropdown-item" href="router.php?action=patientChoixPraticien">Prendre un RDV avec un praticien</a></li>';
            $menuContent .= '</ul>';
            $menuContent .= '</li>';
          }

          echo $menuContent;
        }
        ?>

        <!-------- INNOVATIONS -------->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=propositionsFonctionnalites">Proposition d'amélioration</a></li>
            <li><a class="dropdown-item" href="router.php?action=desinscriptionForm">Se désinscrire</a></li>
            <li><a class="dropdown-item" href="router.php?action=patientAnnulerRdv">Annuler un RDV</a></li>
          </ul>
        </li>


        <!-------- CONNEXION -------->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router.php?action=connexionLogin">Log in</a></li>
            <li><a class="dropdown-item" href="router.php?action=inscription">S'inscrire</a></li>
            <li><a class="dropdown-item" href="router.php?action=deconnexion">Déconnexion</a></li>
            
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- ----- fin fragmentDoctolibMenu -->