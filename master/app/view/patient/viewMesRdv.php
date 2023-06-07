<!-- ----- début viewMonCompte -->
<?php

require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
require_once '../model/ModelRendezVous.php';
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/doctolibMenu.html';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Liste de mes rendez-vous</h4>

        <table class="table table-striped table-bordered" style="width:300px">
            <thead>
                <tr>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">rdv_date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $personneModel = new ModelPersonne();

                foreach ($results as $element) {
                    $praticienId = $element->getPraticienId();
                    $praticien = $personneModel->getOneId($praticienId);
                    printf(
                        "<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
                        $praticien->getNom(),
                        $praticien->getPrenom(),
                        $element->getRdvDate()
                    );
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewMonCompte -->