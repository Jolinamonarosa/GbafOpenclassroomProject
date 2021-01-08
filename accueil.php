<?php
session_start();
include_once 'database.php';
?>
 
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
  </head>
<header>
      <?php include 'header_user.php' ?>
</header>
    <div id="content">
        <a href='accueil.php?deconnexion=true'><span>Déconnexion</span></a>
    </div>
        <div class="description_accueil">
            <h1>Le Groupement Banque Assurance Français</h1>
            <p>Fédération représentant les 6 grands groupes français : BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale, La Banque Postale.
            <br> Représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française.</p>
        </div>
        
        <div class="listing">
            <div class="acteurs">
                <img src="images/formation_co.jpg" alt="Formation & Co">
                <div class="content">
                    <h3>Formation & Co</h3>
                    <p>Formation & Co est une association française présente sur tout le territoire.<br>
                    Nous proposons à des personnes issues de tout milieu...<a class="personal-link-acteur" href="#">Formation & Co</a>
                    </p>
                    <p class="link"><a href="formation_co.php?id=1">Lire la suite</a></p>
                </div>
            </div>
<article>
            <div class="acteur">
                <img src="images/protectpeople.jpg" alt="Protect People">
                <div class="content">
                    <h3>Protect People</h3>
                    <p>Protect people finance la solidarité nationale.<br>Nous appliquons le principe édifié par la sécurité sociale française en 1945...
                <a class="personal-link-acteur" href="#">Protect People</a></p>
                    <p class="link"><a href="protectpeople.php?id=2">Lire la suite</a></p>
                </div>
            </div>
</article>
<article>
            <div class="acteur">
            <img src="images/dsa.jpg" alt="DSA France">
                <div class="content">
                    <h3>DSA France</h3>
                    <p>Dsa France accélère la croissance du territoire et s'engage avec les collectivités territoriales.<br>
                    Nous accompagnons les entrep...
                    <a class="personal-link-acteur" href="#">DSA France.fr</a></p>
                    <p class="link"><a href="dsa.php?id=3">Lire la suite</a></p>
                </div>
            </div>
</article>
<article>
            <div class="acteur">
                <img src="images/cde.jpg" alt="Chambre des Entrepreneurs (CDE)">
                <div class="content">
                    <h3>Chambre des Entrepreneurs (CDE)</h3>
                    <p>La CDE(Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation.<br>
                    Son président est élu pour 3 an...<a class="personal-link-acteur" href="#">Chambre des Entrepreneurs.fr</a></p>
             <p class="link"><a href="cde.php">Lire la suite</a></p>
                </div>
            </div>
</article>
        </div>
</body>
</html>