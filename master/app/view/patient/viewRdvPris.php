<!-- ----- début viewRdvPris -->
<?php

require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/doctolibMenu.html';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Informations sur mon rendez-vous</h4>

        <table class="table table-striped table-bordered" style="width:350px">
            <thead>
                <tr>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">date</th>
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

    <!-- ----- fin viewRdvPris -->