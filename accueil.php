<?php
session_start();
$id = $_SESSION['id'];
require_once 'functions.php';
$articles = getArticles();
?>

<?php require_once 'header_user.php'; ?>
<br/><br/><br/><br/><br/><br/><br/>
<h1 style="text-align:center;">Le Groupement Banque Assurance Français</h1>
<p class = "description" style="text-align:center;">Fédération représentant les 6 grands groupes français :
</br> BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale, La Banque Postale.
<br/>
<br> Représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française.
<br/><br/>
Même s’il existe une forte concurrence entre ces entités, elles vont toutes travaillerde la même façon pour gérer près de 80 millions
<br/>
de comptes sur le territoirenational.Le GBAF est le représentant de la profession bancaire et des assureurs sur tousles axes de la réglementation
<br/>
financière française. Sa mission est de promouvoirl'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié despouvoirs publics.</p>
</br></br></br></br>

    <?php foreach($articles as $article): ?>
        <div class="listing">
            <div class="content">
                <?= $article->logo ?>
                <h2><?= $article->titre ?></h2>
                <?= $article->extrait ?>
                    <p class="link"><a href="article.php?id=<?= $article->id ?>">Lire la suite</a></p>
            </div>
        </div>
    <?php endforeach; ?>
<?php require_once 'footer.php'; ?>