<?php
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
header('Location: accueil.php');
}else {
    extract($_GET);
    $id = strip_tags($id);

    require 'functions.php';

    $article = getArticle($id);
}
?>
<?php require_once 'header_user.php';?>
<body>
</br></br></br></br>
    <h1><?= $article->logo ?></h1>
    <p><?= $article->texte ?></p>
    <?php require_once 'minichat.php'; ?>
</body>
