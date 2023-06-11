<!-- ----- début viewDesinscription -->
<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentDoctolibMenu.php';

    include($root . '/app/view/fragment/fragmentDoctolibJumbotron.html');
    ?>
        <p style="color: #EB57A4; font-weight: bold">Veuillez-vous identifier en tant que patient pour annuler un rdv </p>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewDesinscription -->