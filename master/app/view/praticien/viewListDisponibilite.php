<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/doctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Liste de mes disponibilités</h4>

        <table class="table table-striped table-bordered" style="width:350px">
            <thead>
                <tr>
                    <th scope="col">rdv_date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $element) {
                    if (!empty($element->getRdvDate())) {
                        printf(
                            "<tr><td>%s</td></tr>",
                            $element->getRdvDate()
                        );
                    }
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
</body>

<!-- ----- fin viewListDispo -->