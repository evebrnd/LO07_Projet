<!-- ----- début viewInsertSpe -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/doctolibMenu.html';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group row">
        <input type="hidden" name='action' value='speCreated'>        
        <label for="label" class="col-sm-2 col-form-label">label :</label>
        <div class="col-sm-10">
          <input type="text" name='label' id="label" size='75' value='Vétérinaire' class="form-control" style="width: 300px">
        </div>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    <p/>
    <br>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInsertSpe -->
