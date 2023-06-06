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
      ?>
      <?php  
        
        if (!empty($_SESSION)):?>
      <h2>Tableau $_SESSION</h2>
	<table class="table table-bordered">
		<tr>
			<th>Clé</th>
			<th>Valeur</th>
		</tr>
		<?php foreach ($_SESSION as $key => $value): ?>
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
    <?php endif;

    
   include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewLogge -->



