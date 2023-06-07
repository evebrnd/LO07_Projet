<!-- ----- début viewInsertDispo -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
      include ($root . '/app/view/doctolibMenu.html');
      include ($root . '/app/view/fragment/fragmentDoctolibJumbotron.html');
    ?> 

    <form role="form" method="get" action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='praticienRdvAjoute'>
        <label class='w-25' for="rdv_date">date : </label>
        <input type="date" name='rdv_date' size='75' value='<?php echo $_GET["rdv_date"] ; ?>'> <br/>                          
        <label class='w-25' for="rdv_nombre">rdv_nombre : </label>
        <input type="number" name='rdv_nombre' value='<?php echo $_GET["rdv_nombre"] ; ?>'> <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInsertDispo -->



