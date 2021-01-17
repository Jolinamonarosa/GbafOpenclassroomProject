<?php
session_start();
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Acteur DSA France</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
  </head>

  <?php require 'header_user.php'; ?>
      <div class="description">
      <img src="images/dsa.jpg" alt="DSA France">
        <p>Dsa France accélère la croissance du territoire et s'engage avec les collectivités territoriales.
        <br>Nous accompagnons les entreprises dans les étapes clés de leur évolution.
        </br>Notre philosophie : s'adapter à chaque entreprise.
        </br>Nous les accompagnons pour voir plus grand et plus loin et proposons des solutions de
        </br>financement adaptées à chaque étape de la vie des entreprises.</p>
        </div>
        </div>
        <?php require 'minichat.php'; ?>
</body>
</html>