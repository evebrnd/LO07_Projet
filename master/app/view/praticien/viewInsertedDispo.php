<!-- ----- début viewInserted -->
<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include($root . '/app/view/fragment/fragmentDoctolibMenu.php');
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    foreach ($resultsArray as $result) {
      print $result . "<br>";
    }


    echo ("</div>");

    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
    <!-- ----- fin viewInserted -->