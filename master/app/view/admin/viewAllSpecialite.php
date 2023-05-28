<!-- ----- début viewAllSpe -->
<?php

require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/doctolibMenu.html';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Liste des spécialités</h4>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">label</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $element) {
                    printf(
                        "<tr><td>%d</td><td>%s</td></tr>",
                        $element->getId(),
                        $element->getLabel()
                    );
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewAllSpe -->