 <!-- ----- debut de la page Mes Propositions -->
 <?php require($root . '/app/view/fragment/fragmentDoctolibHeader.html'); ?>

 <body>
     <div class="container">
         <?php
            include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
            include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
            ?>

         <h3>Propositions d'améliorations du projet :</h3>

         <div style="padding:20px;">
             <h4>1. Implémenter un tableau associatif de routage</h4>
             <p>
                 On pourrait utiliser un tableau associatif pour associer les actions aux fonctions du contrôleur correspondantes.
                 Le routeur permettrait de récupérer l'action demandée, sous forme de paramètre ou d'argument lors de l'appel du routeur. Ensuite il faudrait parcourir le tableau de configuration pour trouver la correspondance. <br>
                 Le routeur peut alors appeler cette fonction du contrôleur pour exécuter le code logique correspondant à cette action.<br>

                 L'utilisation d'une structure switch (fait actuellement) peut être simple et efficace pour un système avec un nombre limité d'actions. Cependant, lorsque le nombre d'actions augmente ou pour une meilleure modularité l'utilisation de tableaux de routage selon l'action peut être une amélioration.
             </p>
             <h4>2. Adopter une approche 100% MVC pour mieux séparer les composants</h4>
             <p>
                 Certaines fonctions du contrôleur comportent encore de la logique du code donc l’idée serait de bien tout fragmenter : modèle pour la logique et la gestion des données et la vue pour l'affichage des données et l'interface utilisateur puis le contrôleur pour gestion des interactions entre les modèles et les vues.
             </p>
             <h4>3. Utiliser une approche plus orientée objet </h4>
             <p>
                 Utiliser l'héritage et la polymorphie pour organiser la structure de classe de manière cohérente. Exemple : Créer des classes abstraites qui servent d'interfaces pour réutiliser des fonctions communes entre plusieurs set de données (insertion, suppression etc).
             </p>
             <h4>4. Utiliser des outils de visualisation pour représenter graphiquement les données de la base de données</h4>
             <p>
                 VegaLite est une bibliothèque qui permettrait de créer un module de visualisation qui pourrait aider à identifier les tendances, schémas ou relations cachées entre les données. On utiliserait un script JavaScript et la fonction vegaEmbed pour afficher la visualisation à l'écran. <br>
                 Cela nous permettrait de moins recourir à des tableaux.
             </p>
         </div>
     </div>

     <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

 </body>

 </html>
 <!-- ----- fin de la page Mes Propositions -->