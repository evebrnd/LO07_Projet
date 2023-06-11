<!-- ----- début viewDesinscription -->
<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include($root . '/app/view/doctolibMenu.php');

    include($root . '/app/view/fragment/fragmentDoctolibJumbotron.html');
    ?>

    <form role="form" method="get" action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='desinscription'>
        <div>
            <label> Voulez vous vous désinscrire ?</label>
            <br/>
        </div>
      <button class="btn btn-primary" type="submit">Se désinscrire</button>
    </form>
    <br>
    <p />
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewDesinscription -->