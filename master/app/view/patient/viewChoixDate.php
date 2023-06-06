<!-- ----- début viewChoixDate -->
<?php

require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/doctolibMenu.html';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Choix de la date</h4>

        <form role="form" method='get' action='router.php'>
        <input type="hidden" name='praticien_id' value='<?php echo $praticien_id; ?>'>
        <input type="hidden" name='action' value='patientUpdateRdv'>
            <div class="form-group">
                
                <label for="date">dates : </label> 
                <select class="form-control" id='rdv_date' name='rdv_date' style="width: 100px">
                    <?php
                        $dispos = ModelRendezVous::getDispo($praticien_id);
                        foreach ($dispos as $dispo) {
                            printf(
                                "<option value='%s'>%s</option>", 
                                    $dispo->getRdvDate(),
                                    $dispo->getRdvDate()
                            );
                        }
                    ?>
                </select>
            </div>
            <p/><br/>
            <button class="btn btn-primary" type="submit">Go</button>
    </form>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewChoixDate -->