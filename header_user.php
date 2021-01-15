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
        <ul class="navbar-nav mr auto">
            <? nav_menu('nav-link') ?>
        </ul>
        <ul class="navbar-nav">
        <div id="content">
            <?php
              if($_SESSION['pseudo'] !== "") {
                $user = $_SESSION['pseudo'];
                echo "Bonjour $user, vous êtes connecté";
                }
            ?>
          </div>
        <?php if(est_connecte()): ?>
            <li class="nav-item"><a href="deconnexion.php" class="nav-link">Se déconnecter></a></li>
        <?php endif ?>
        </ul>
  </header>
</html>