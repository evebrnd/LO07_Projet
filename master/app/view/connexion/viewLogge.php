<!-- ----- début viewLogge -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
      include ($root . '/app/view/doctolibMenu.html');
      include ($root . '/app/view/fragment/fragmentDoctolibJumbotron.html');
    
      

      $mdp=$_GET['mdp'];

      if ($mdp == $results)
      {
        echo "Connexion validée";
      } else {
        echo "mauvais mdp ou login";
      }


    
   include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewLogge -->



