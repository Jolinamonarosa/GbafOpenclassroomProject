<?php
session_start();
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>CDE</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
  </head>
  <header>
      <?php require 'header_user.php'; ?>
</header>
      <div class="description">
      <img src="images/cde.jpg" alt="CDE">
        <p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation.
        <br>Son président est élu pour 3 ans par ses pairs, chefs d'entreprises et présidents des CDE.</p>
        </div>
        </div>
        <?php require 'minichat.php'; ?>
</body>
</html>