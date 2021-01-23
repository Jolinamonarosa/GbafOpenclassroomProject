<?php
if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
header('Location: accueil.php');
}else {
    extract($_GET);
    $id = strip_tags($id);

require 'functions.php';
    if(!empty($_POST)) {
        extract($_POST);
        $errors = array();
        $pseudo = strip_tags($_POST['id_pseudo']);
        $comment = strip_tags($comment);

        if(empty($pseudo)) {
            array_push($errors, 'Entrez un pseudo');
            if(empty($comment)) {
                array_push($errors, 'Entrez un commentaire');
                if(count($errors) == 0) {
                    $comment = addComment($id, $pseudo, $comment);

                    $success = "Votre commentaire a été publié";

                    unset($pseudo);
                    unset($comment);
                }
            }
        }
    }

    $article = getArticle($id);
    $comments = getComments($id);
}
if(isset($_GET['id']) && $_GET['id'] > 0) {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
      $getid = intval($_GET['id']); 
      $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
      $requser->execute(array($getid));
    $userinfo = $requser->fetch();
  }
  
    if(isset($_SESSION['id'])) {
        $requser= $bdd->prepare("SELECT * FROM membres WHERE pseudo = ?");
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
    }
?>
<?php require_once 'header_user.php';?>
</br></br></br></br>
<a href="accueil.php" class="nav-link"><img src="https://img.icons8.com/wired/64/000000/long-arrow-left.png"/></a>
    <div class="listing">
        <div class="content">
    <h1><?= $article->logo ?></h1>
    <p><?= $article->texte ?></p>
        </div>
    </div>
    <?php 
    if(isset($succes))
        echo $success;
    
    if(!empty($errors)):
    ?>

        <?php foreach($errors as $error): ?>
        <p><?= $error ?>
        <?php endforeach; ?>

    <?php endif; ?>
    <div class="listing">
        <div class="content">
    <form action="article.php?id=<?= $article->id ?>" method="POST">
        <p><label for="id_pseudo">Pseuso :</label><br />
        <input type="text" name="id_pseudo" id="id_pseudo" value="<?php if(isset($pseudo)) echo $pseudo ?>"></p>
        <p><label for="comment">Commentaire :</label><br />
        <textarea name="comment" id="comment" cols="30" rows="8"><?php if(isset($comment)) echo $comment ?></textarea></p>
        <button type="submit">Envoyer</button>
    </form>
    </div>
    <h2>Commentaires :</h2>
    <?php
         $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
         $sql = ('SELECT id_pseudo, comment, date FROM commentaires');
         $req = $bdd->query($sql);
         while($row =$req->fetch()){
             ?>
              <li><b><?php echo $row['id_pseudo'] ?></b>
              <?php echo $row['date'] ?></br>
              <?php echo $row['comment'] ?></li>
              <?php
         }

        ?>
</div>
</body>