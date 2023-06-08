<!-- ----- début viewLogge -->

<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include($root . '/app/view/doctolibMenu.php');
    include($root . '/app/view/fragment/fragmentDoctolibJumbotron.html');

    session_start();
    if ($_SESSION['login'] != 'NULL') {
       $login = $_SESSION['login'];
       $tempUser = ModelPersonne::getOneLogin($login);
    }


    $password = $_GET['password'];

    if ($password == $results) {
      echo "<h2>Connexion validée</h2>";
    } else {
      echo "<h2>Mauvais mot de passe ou login</h2>";
    }
    ?>
    <?php

    if (!empty($_SESSION)) : ?>
      <table class="table table-bordered">
        <tr>
          <th>Clé</th>
          <th>Valeur</th>
        </tr>
        <?php foreach ($_SESSION as $key => $value) : ?>
          <tr>
            <td><?php echo $key; ?></td>
            <td><?php
                if (is_array($value)) {
                  echo implode(", ", $value);
                } else {
                  echo $value;
                } ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>

  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewLogge -->