<!-- ----- début viewRdvWithPatient -->
<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Quel RDV souhaitez-vous annuler ?</h4>

        <form role="form" method='get' action='router.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='rdvAnnule'>
                <select class="form-control" id='rdv' name='rdv' style="width: 200px">
                <?php
                foreach ($patients as $date => $patient) {
                    printf(
                        "<option>%s %s %s</option>",
                        $patient->getNom(),
                        $patient->getPrenom(),
                        $date
                    );
                }
                ?>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Valider</button>
        </form>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewRdvWithPatient -->