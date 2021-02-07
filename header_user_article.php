<?php
require_once 'database.php';
require_once 'auth.php';
forcer_utilisateur_connecte();
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
$getid = intval($_GET['id']);
$requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
$requser->execute(array(2));
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
<body>
 <header>
    <div id="logo">
      <div id="header_user">
        <a href="accueil.php?id=2"><img src="images/logo_gbaf.jpg"></a>
      </div>
    </div>
    <div id="header_user">
        <?php if(bonjour_user()): ?>
        <?php endif ?>
        <?php if(est_connecte()): ?>
    </div>
          <div id="header_user">
            <a href="deconnexion.php" class="nav-link"><img src="https://img.icons8.com/wired/64/000000/logout-rounded-up.png"/></a>
            <?php endif ?>
          </div>
          <div id="header_user">
            <a href="profil.php?id=2"><img src="https://img.icons8.com/wired/64/000000/circled-user.png"/></a>
          </div>
      </div>
      <div id="header_user">
        <a href="profil.php?id=2"><b><?php echo $userinfo['nom']; ?>
        <?php echo $userinfo['prenom']; ?></b></a>
      </div>
  </header>
</html>