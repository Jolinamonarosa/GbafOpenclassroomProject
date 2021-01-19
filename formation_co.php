<?php
session_start();
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Acteur Formation & Co</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
  </head>
  <header>
      <?php require 'header_user.php'; ?>
  </header>
  <body>
      <div class="description">
      <img src="images/formation_co.jpg" alt="Formation & Co">
        <p>Formation & Co est une association française présente sur tout le territoire.
        <br>Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.
        </br>Notre proposition :
            <p>Un financement jusqu'à 30 000€;</br>
            Un suivi personnalisé et gratuit;</br>
            Une lutte acharnée contre les freins sociétaux et les stéréotypes.</p></br>
            Le financement est possible, peu importe le métier: coiffeur, banquier, éleveur de
        </br>chèvres... Nous collaborons avec des personnes talentueuses et motivées.
        </br>Vous n'avez pas de diplômes? Ce n'est pas un problème pour nous !
        </br>Nos financements s'adressent à tous.</p>
      </div>
      <?php require 'minichat.php'; ?>
</body>
    </html>