<!-- ----- début viewListDispo -->
<?php

require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/doctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Liste de mes patients</h4>

        <table class="table table-striped table-bordered" style="width:350px">
            <thead>
                <tr>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($patients as $element) {
                    printf(
                        "<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
                        $element->getNom(),
                        $element->getPrenom(),
                        $element->getAdresse()
                    );
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewListDispo -->