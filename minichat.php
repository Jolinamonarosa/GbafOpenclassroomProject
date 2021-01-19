<?php
require_once 'database.php';
require "vote.php";
$vote = false;
if(isset($_GET['id']) && $_GET['id'] > 0) {
  $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
	$getid = intval($_GET['id']); 
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
  $userinfo = $requser->fetch();
}

  if(isset($_SESSION['id'])) {
      $requser= $bdd->prepare("SELECT * FROM membres WHERE id = ?");
      $requser->execute(array($_SESSION['id']));
      $user = $requser->fetch();
  }

    if(isset($_SESSION['user_id'])) {
        $req =$pdo->prepare('SELECT * FROM votes WHERE ref = ? AND ref_id = ? AND user_id = ?');
        $req->execute(['articles', $_GET['id'], $_SESSION['user_id']]);
        $vote = $req->fetch();
        var_dump($vote);
    }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Header GBAF</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
    <link rel="icon" href="images/logo_gbaf.jpg" />
    <script src="https://kit.fontawesome.com/a5f9819284.js" crossorigin="anonymous"></script>
  </head>
  
<div class="vote_bar">
    <div class="vote_progress" style="width:<?= ($post->like_count + $post->dislike_count) == 0 ? 100 : round(100 * ($post->like_count / ($post->like_count + $post->dislike_count))); ?>%;"></div>
    </div>
        <div class="vote_btns">
            <form action="like.php?ref=articles&ref_id=9&vote=1" method="POST">
                <button type="submit" class="vote_btn vote_like"><i class="far fa-thumbs-up"></i><?= $post->like_count?></button>
            </form>
            <form action="like.php?ref=articles&ref_id=9&vote=1" method="POST">
                <button type="submit" class="vote_btn vote_dislike"><i class="far fa-thumbs-down"></i><?= $post->dislike_count?></button>
            </form>
        </div>
        <form action="minichat_post.php" method="post">
        <p>
        <label for="id_pseudo">Pseudo</label> : </br><input type="text" style="width: 400px; height: 30px" name="id_pseudo" id="id_pseudo" value="<?php echo $userinfo['pseudo']; ?>" /><br />
        <label for="contenu">Message</label> : </br><textarea name="contenu" type ="text" id="contenu" style="width: 452px; height: 35px;" placeholder="Votre commentaire..."></textarea><br>
        <input type="submit" value="PUBLIER" id="submit_commentaire" name="submit_commentaire">
      	</p>
        </form>
        <ul>
        <?php
         $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
         $sql = ('SELECT id_pseudo, contenu, date FROM articles');
         $req = $bdd->query($sql);
         while($row =$req->fetch()){
             ?>
          <div id="section_commentaire">
          <section>
              <li><b><?php echo $row['id_pseudo'] ?></b>
              <?php echo $row['date'] ?></br>
              <?php echo $row['contenu'] ?></li>
         </section>
         </div>
             <?php
         }

        ?>
</ul>
        </div>
</div>
