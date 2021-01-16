<?php
require_once 'database.php';
require_once 'auth.php';
forcer_utilisateur_connecte();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Header utilisateur</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
  </head>
 <header>
    <div id="logo">
        <a href="accueil.php"><img src="images/logo_gbaf.jpg"></a>
    </div>
        <ul class="navbar-nav">
        <div id="success">
            <?php if(bonjour_user()): ?>!
            <?php endif ?>
          </div>
        <?php if(est_connecte()): ?>
          <div id="deco">
            <li><a href="deconnexion.php" class="nav-link">Déconnexion</a></li>
        <?php endif ?>
        </div>
        <div id="profil">
        <li><a href="profil.php">Mon profil</a></li>
        </div>
        </ul>
  </header>
</html>