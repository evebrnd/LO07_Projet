<!-- ----- début viewAllPraticien -->
<?php

require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Liste des praticiens avec leur spécialité</h4>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">adresse</th>
                    <th scope="col">specialite</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results_praticien as $element) {
                    printf(
                        "<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                        $element->getId(),
                        $element->getNom(),
                        $element->getPrenom(),
                        $element->getAdresse(),
                        $results_specialite[$element->getSpecialiteId()]->getLabel()
                    );
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewAllPraticien -->