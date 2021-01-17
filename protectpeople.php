<?php
session_start();
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Acteur Protectpeople</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
  </head>
<?php require 'header_user.php'; ?>
      <div class="description">
      <img src="images/protectpeople.jpg" alt="Protect People">
        <p><strong>Protectpeople finance la solidarité nationale.
        </br>Nous appliquons le principe édifié par la sécurité sociale française en 1945: permettre à
        </br>chacun de bénéficier d'une protection sociale.</strong>
        </br>
        Chez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.
        </br>Protectpeople est ouvert à tous, sans considération d'âge ou d'état de santé.
        </br>Nous garantissons un accès aux soins et une retraite.
        </br>Chaque année, nous collectons et répartissons 300 milliards d'euros.
</br></br>Notre mission est double :
        <ul>
            <li>sociale: nous garantissons la fiabilité des données sociales;</li>
            <li>économique: nous apportons une contribution aux activités économiques.</li>
        </ul></p>
        </div>
  <?php require 'minichat.php'; ?>
</body>
</html>