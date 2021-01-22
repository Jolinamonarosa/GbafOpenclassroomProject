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
<body>
 <header>
    <div id="logo">
      <div id="header_user">
        <a href="accueil.php"><img src="images/logo_gbaf.jpg"></a>
      </div>
    </div>
    <div id="header_user">
          <div id="success">
            <?php if(bonjour_user()): ?>!
            <?php endif ?>
          </div>
            <?php if(est_connecte()): ?>
          <div id="header_user">
            <a href="deconnexion.php" class="nav-link"><img src="https://img.icons8.com/wired/64/000000/logout-rounded-up.png"/></a>
            <?php endif ?>
          </div>
          <div id="header_user">
            <a href="profil.php"><img src="https://img.icons8.com/wired/64/000000/circled-user.png"/></a>
          </div>
      </div>
  </header>
</html>