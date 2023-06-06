<!-- ----- début viewConnexion -->
 
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
        <input type="hidden" name='action' value='connexionLogge'>   
        <label class='w-25' for="login">Login : </label>
        <input type="text" name='login' size='75' value=''> <br/>                          
        <label class='w-25' for="mdp">password : </label>
        <input type="password" name='mdp' value=''> <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewConnexion -->



