<!-- ----- début viewAllInfo -->
<?php

require($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/doctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h3>Informations</h3>
        <br>
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
                foreach ($results_spe as $element) {
                    printf(
                        "<tr><td>%d</td><td>%s</td></tr>",
                        $element->getId(),
                        $element->getLabel()
                    );
                }
                ?>
            </tbody>
        </table>

        <hr>
        <h4>Liste des praticiens</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">adresse</th>
                    <th scope="col">login</th>
                    <th scope="col">password</th>
                    <th scope="col">statut</th>
                    <th scope="col">specialite_id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results_praticien as $element) {
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

        <hr>
        <h4>Liste des patients</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">adresse</th>
                    <th scope="col">login</th>
                    <th scope="col">password</th>
                    <th scope="col">statut</th>
                    <th scope="col">specialite_id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results_patient as $element) {
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

        <hr>
        <h4>Liste des administrateurs</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">nom</th>
                    <th scope="col">prenom</th>
                    <th scope="col">adresse</th>
                    <th scope="col">login</th>
                    <th scope="col">password</th>
                    <th scope="col">statut</th>
                    <th scope="col">specialite_id</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results_admin as $element) {
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

        <hr>
        <h4>Liste de tous les rdv</h4>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">patient_id</th>
                    <th scope="col">praticien_id</th>
                    <th scope="col">rdv_date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($results_rdv as $element) {
                    printf(
                        "<tr><td>%d</td><td>%d</td><td>%d</td><td>%s</td></tr>",
                        $element->getId(),
                        $element->getPatientId(),
                        $element->getPraticienId(),
                        $element->getRdvDate()
                    );
                }
                ?>
            </tbody>
        </table>
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewAllInfo -->