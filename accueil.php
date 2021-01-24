<?php
session_start();
require_once 'functions.php';
$articles = getArticles();
?>

<?php require_once 'header_user.php'; ?>
</br></br></br></br>
<h1 style="text-align:center;">Le Groupement Banque Assurance Français</h1>
<p class = "description" style="text-align:center;">Fédération représentant les 6 grands groupes français :</br> BNP Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC, Société Générale, La Banque Postale.
<br> Représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française.</p>
<section>
    <?php foreach($articles as $article): ?>
        <div class="listing">
                <div class="content">
                        <?= $article->logo ?>
                        <h2><?= $article->titre ?></h2>
                        <?= $article->extrait ?><a class="personal-link-acteur" href="#">Formation & Co</a>
                        <p class="link"><a href="article.php?id=<?= $article->id ?>">Lire la suite</a></p>
                    </div>
            </div>
            <?php endforeach; ?>
    </div>
</section>
<?php require_once 'footer.php'; ?>