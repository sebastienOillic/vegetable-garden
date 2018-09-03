<?php
require_once '../templates/menu.php';
?>

<p>Votre agence a été mandaté pour réaliser un simulateur de potager.</p>

<h2>Règles de gestion</h2>

<table class="table">
    <tr>
        <td>Les légumes "racine" ( pomme de terre, carotte ) sont récoltable au bout de 30sec. <br>20 par m2 si PH < 4<br>35 par m2 si PH >= 4 et <= 10<br>18 si PH > 10</td>
    </tr>
    <tr>
        <td>Les légumes "feuille" ( salade, épinard ) sont récoltable au bout de 15sec. <br>30 par m2 si PH < 4<br>55 par m2 si PH >= 4 et <= 11<br>28 si PH > 11</td>
    </tr>
    <tr>
        <td>Les légumes "fruit" ( tomate, courgette ) sont récoltable au bout de 45sec. <br>10 par m2 si PH < 5<br>13 par m2 si PH >= 5 et <= 10<br>9 si PH > 10</td>
    </tr>
    <tr>
        <td>Vous devez laisser 15 secondes entre chaque nouvelle plantation</td>
    </tr>
    <tr>
        <td>Lorsque l'on clique sur le bouton "Récolter", la colonne "Récolté" se met à jour, et le bouton "Semer / Planter" est à nouveau disponible mais désactivé pendant 15 secondes</td>
    </tr>
</table>

<h2>Etapes de conception</h2>
<ul class="list-group">
  <li class="list-group-item">Créer un <a href="dashboard.php">dashboard</a></li>
  <li class="list-group-item list-group-item-success">Créer une page de <a href="params.php">paramètrage</a></li>
  <li class="list-group-item list-group-item-success">Faire en sorte que le menu de navigation ne soit codé qu'une fois DRY</li>
  <li class="list-group-item list-group-item-success">Stocker en session les informations de paramètrages</li>
  <li class="list-group-item">Créer les fonctions nécessaires et tester les unitairement</li>
  <li class="list-group-item">Penser aux dataproviders sur PHPUnit</li>
  <li class="list-group-item list-group-item-success">Stocker les informations en base de données</li>
  <li class="list-group-item list-group-item-success">Pouvoir ajouter des nouveaux légumes dans le paramètrage et les catégoriser par famille (feuille, racine, fruit )</li>
  <li class="list-group-item list-group-item-success">Sur MySQL, créer une base de donnée permettant de modéliser l'application</li>
  <li class="list-group-item list-group-item-success">Grâce à PDO, créer des fonctions permettant de récupérer et modifier les enregistrements</li>
  <li class="list-group-item">Remonter des informations météo graçe à l'API https://openweathermap.org en imaginant une tâche tournant toutes les heures.</li>
  <li class="list-group-item">Afficher ces informations sur le dashboard</li>
  <li class="list-group-item">Créer un accès sécurisé à votre application</li>
</ul>
</body>
</html>
