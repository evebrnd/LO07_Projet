<!-- ----- début viewInsertedSpe -->
<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/doctolibMenu.html';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
      echo ("<h4>La nouvelle spécialité a été ajoutée </h4>");
      echo ("<ul>");
      echo ("<li>id = " . $results . "</li>");
      echo ("<li>label = " . $_GET['label'] . "</li>");
      echo ("</ul>");
    } else {
      echo ("<h4>Problème d'insertion de la spécialité</h4>");
      echo ("<p>La valeur insérée est certainement vide</p>");
    }

    echo ("<br>");
    echo ("</div>");

    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
    <!-- ----- fin viewInsertedSpe -->