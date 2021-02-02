<?php
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
header('Location: accueil.php');
}else {
    extract($_GET);
    $id = strip_tags($id);

require_once 'functions.php';
    $article = getArticle($id);
    $comments = getComments($id);
}

if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $article = $bdd->prepare('SELECT * FROM partenaire WHERE id = ?');
    $article->execute(array($get_id));

    if($article->rowCount() == 1) {
        $article = $article->fetch();
        $id = $article['id'];
        $logo = $article['logo'];
        $titre = $article['titre'];
        $texte = $article['texte'];

        $likes = $bdd->prepare('SELECT id FROM likes WHERE id_partenaire = ?');
        $likes->execute(array($id));
        $likes = $likes->rowCount();

        $dislike = $bdd->prepare('SELECT id FROM dislike WHERE id_partenaire = ?');
        $dislike->execute(array($id));
        $dislike = $dislike->rowCount();
    }else {
        die("Cet article n'existe pas !");
    }
}else {
    die('Erreur');
}

?>
<?php require_once 'header_user.php';?>
</br></br></br></br>
<a href="accueil.php?id=2" class="nav-link"><img src="https://img.icons8.com/wired/64/000000/long-arrow-left.png"/></a>
    <div class="listing">
        <div class="content">
        <h1><?= $article['logo'] ?></h1>
        <p><?= $article['texte'] ?></p>
        <div class="vote_bar">
          <div class="vote_progress"></div>
          </div>
        <div class="vote_btns">
            <form action="" method="POST">
                <button type="submit" class="vote_btn vote_like"><a href="action.php?t=1&id=<?= $id ?>"><i class="far fa-thumbs-up" style="color: green;"></i></a></button>(<?= $likes ?>)
            </form>
            <form action="" method="POST">
                <button type="submit" class="vote_btn vote_dislike"><a href="action.php?t=2&id=<?= $id ?>"><i class="far fa-thumbs-down" style="color: red;"></i></a></button>(<?= $dislike ?>)
            </form>
        </div>
        </div>
    </div>
   <?php require_once 'minichat.php'; ?>
   <?php require_once 'footer.php'; ?>