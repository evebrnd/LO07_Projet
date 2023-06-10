<!-- ----- début viewMonCompte -->
<?php
require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h4>Informations de mon compte</h4>

        <table class="table table-striped table-bordered" style="width:350px">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">adresse</th>
                    <th scope="col">login</th>
                    <th scope="col">password</th>
                    <th scope="col">statut</th>
                    <th scope="col">specialite</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results as $element) {
                    printf(
                        "<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>",
                        $element->getId(),
                        $element->getNom(),
                        $element->getPrenom(),
                        $element->getAdresse(),
                        $element->getLogin(),
                        $element->getPassword(),
                        $element->getStatut(),
                        $element->getSpecialiteId()
                    );
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewMonCompte -->