<!-- ----- début viewChoixPraticien -->
<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Sélection du praticien</h4>

        <form role="form" method='get' action='router.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='patientReadId'>
                <label for="id">id : </label> <select class="form-control" id='praticien_id' name='praticien_id' style="width: 200px">
                    <?php
                    $personneModel = new ModelPersonne();

                    foreach ($results as $element) {
                        $praticienId = $element->getPraticienId();
                        $praticien = $personneModel->getOneId($praticienId);
                        printf(
                            "<option value='%d'>%s %s</option>",
                            $praticienId,
                            $praticien->getNom(),
                            $praticien->getPrenom()
                        );
                    }
                    ?>
                </select>
            </div>
            <p />
            <br>
            <button class="btn btn-primary" type="submit">Valider</button>
        </form>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewChoixPraticien -->