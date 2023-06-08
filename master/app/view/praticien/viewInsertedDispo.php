<!-- ----- début viewInserted -->
<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include($root . '/app/view/doctolibMenu.php');
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
      echo ("<h3>Le créneau horaire a été ajouté </h3>");
      echo ("<ul>");
      echo ("<li>id = " . $results['id'] . "</li>");
      echo ("<li>rdv_date = " . $_GET['rdv_date'] . "</li>");
      echo ("</ul>");
    } else {
      echo ("<h3>Problème d'insertion du créneau horaire</h3>");
      echo ("rdv_date = " . $_GET['rdv_date']);
    }


    echo ("</div>");

    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
    <!-- ----- fin viewInserted -->