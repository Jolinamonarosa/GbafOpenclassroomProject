<?php
require_once 'database.php';
require_once 'auth.php';
forcer_utilisateur_connecte();
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
$getid = intval($_GET['id']);
$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
$requser->execute(array($getid));
$userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Header utilisateur</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
    <link rel="icon" href="images/logo_gbaf.jpg" />
    <script src="https://kit.fontawesome.com/a5f9819284.js" crossorigin="anonymous"></script>
  </head>
<body>
 <header>
    <div id="logo">
      <div id="header_user">
        <a href="accueil.php"><img src="images/logo_gbaf.jpg"></a>
      </div>
    </div>
    <div id="header_user">
        <?php if(bonjour_user()): ?>!
        <?php endif ?>
        <?php if(est_connecte()): ?>
    </div>
          <div id="header_user">
            <a href="deconnexion.php" class="nav-link"><img src="https://img.icons8.com/wired/64/000000/logout-rounded-up.png"/></a>
            <?php endif ?>
          </div>
          <div id="header_user">
            <a href="profil.php"><img src="https://img.icons8.com/wired/64/000000/circled-user.png"/></a>
          </div>
      </div>
      <div id="header_user">
        <b><?php echo $userinfo['nom']; ?>
        <?php echo $userinfo['prenom']; ?></b>
      </div>
  </header>
</html>