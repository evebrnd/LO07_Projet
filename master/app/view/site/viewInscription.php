<?php require($root . '/app/view/fragment/fragmentDoctolibHeader.html'); ?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <form role="form" method="get" action="router.php">
            <div class="form-group">
                <input type="hidden" name="action" value="inscriptionLogge">
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="nom" class="col-form-label" style="font-weight: bold; width:250px">Nom :</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="nom" name="nom" class="form-control" required>
                    </div>
                </div>
                <p />
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="prenom" class="col-form-label" style="font-weight: bold; width:250px">Prénom :</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                    </div>
                </div>
                <p />
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="adresse" class="col-form-label" style="font-weight: bold; width:250px">Adresse :</label>
                    </div>
                    <div class="col-3">
                        <input type="text" id="adresse" name="adresse" class="form-control" required>
                    </div>
                </div>
                <p />
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="login" class="col-form-label" style="font-weight: bold; width:200px">Login :</label>
                    </div>
                    <div class="col-2">
                        <input type="text" id="login" name="login" class="form-control" required>
                    </div>
                </div>
                <p />
                <div class="row align-items-center">
                    <div class="col-1">
                        <label for="password" class="col-form-label" style="font-weight: bold; width:200px">Password :</label>
                    </div>
                    <div class="col-2">
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                </div>
                <p />
                <p />
                <label for="statut" style="font-weight: bold;">Votre statut :</label>
                <select class="form-control" id="statut" name="statut" style="width: 400px" required onchange="handleStatutChange(this.value)">
                    <option value=<?php echo ModelPersonne::ADMINISTRATEUR ?>>Administrateur</option>
                    <option value=<?php echo ModelPersonne::PRATICIEN ?>>Praticien</option>
                    <option value=<?php echo ModelPersonne::PATIENT ?>>Patient</option>
                </select>
                <p />
                <label for="specialite" style="font-weight: bold;">Votre spécialité si vous êtes praticien :</label>
                <select class="form-control" id="specialite" name="specialite" style="width: 400px" <?php echo ($_GET['statut'] === ModelPersonne::PATIENT) ? 'disabled' : ''; ?>>
                    <?php
                    foreach ($results as $element) {
                        echo ("<option value=" . $element->getId() . ">" . $element->getLabel() . "</option>");
                    }
                    ?>
                </select>
                <input type="hidden" name="specialite" value="0" <?php echo (isset($_GET['statut']) && $_GET['statut'] === ModelPersonne::PATIENT) ? '' : 'disabled'; ?>>
            </div>
            <p />
            <br>
            <button class="btn btn-primary" type="submit">Valider</button>
            <br>
        </form>
        <p />
        <br>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewInscription -->

    <script>
        function handleStatutChange(value) {
            const specialiteSelect = document.getElementById('specialite');
            const specialiteHidden = document.querySelector('input[name="specialite"]');

            if (value === "<?php echo ModelPersonne::PATIENT ?>") {
                specialiteSelect.disabled = true;
                specialiteHidden.disabled = false;
            } else {
                specialiteSelect.disabled = false;
                specialiteHidden.disabled = true;
            }
        }

        // Appel initial pour gérer l'état au chargement de la page
        handleStatutChange(document.getElementById('statut').value);
    </script>
</body>

</html>