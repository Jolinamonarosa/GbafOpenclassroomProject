<?php
session_start();
require_once 'functions.php';
require_once 'header_user.php';
$articles = getArticles();
?>

<section>
    <div id="content">
        <div class="description">
            <h1>Le Groupement Banque Assurance Français</h1>
            <p>Fédération représentant les 6 grands groupes français :</br> BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale, La Banque Postale.
            <br> Représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française.</p>
        </div>
        <?php foreach($articles as $article): ?>
            <div class="listing">
                        <div class="content">
                        <?= $article->logo ?>
                        <h3><?= $article->titre ?></h3>
                        <p><?= $article->extrait ?><a class="personal-link-acteur" href="#">Formation & Co</a>
                        </p>
                        <p class="link"><a href="article.php?id=<?= $article->id ?>">Lire la suite</a></p>
                        </div>
                </div>
            <?php endforeach; ?>
</section>
<?php require_once 'footer.php'; ?>