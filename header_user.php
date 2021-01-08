<?php
include_once 'database.php';
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
        <a href="index.php"><img src="images/logo_gbaf.jpg"></a>
    </div>
        <nav>
        <a href="compte.php"><img class="icon" src=""></a>
        <a href='accueil.php?deconnexion=true'><span>Déconnexion</span></a>
        </nav>
        <?php
    if(isset($_GET['deconnexion'])){ 
        if($_GET['deconnexion']==true){  
            session_unset();
            header("location:connexion.php");
        }
    }else if($_SESSION['pseudo'] !== ""){
        $user = $_SESSION['pseudo'];
        echo "Bonjour $user, vous êtes connectés !";
    }
?>
  </header>
</html>