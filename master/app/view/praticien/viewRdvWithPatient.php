<!-- ----- début viewRdvWithPatient -->
<?php

require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/doctolibMenu.html';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Liste de mes RDV</h4>

        <table class="table table-striped table-bordered" style="width:350px">
            <thead>
                <tr>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">rdv_date</th>
                </tr>
            </thead>
            <tbody>
                <?php
foreach ($patients as $date => $patient) {
    printf(
        "<tr><td>%s</td><td>%s</td><td>%s</td></tr>",
        $patient->getNom(),
        $patient->getPrenom(),
        $date
    );
    print_r($patients);
}


                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewRdvWithPatient -->