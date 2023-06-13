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

    <form role="form" method="get" action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='desinscriptionForm'>
        <div>
            <label> Voulez vous vous désinscrire ?</label>
            <br/>
            <p style="color: #EB57A4; font-weight: bold">Veuillez-vous identifier pour vous désinscrire</p>

        </div>
      <button class="btn btn-primary" type="submit">Se désinscrire</button>
    </form>
    <br>
    <p />
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewDesinscription -->