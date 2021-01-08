<?php
include_once 'database.php';
include_once 'header.php';
require "vote.php";
$vote = false;
if(isset($_SESSION['user_id'])) {
    $req =$pdo->prepare('SELECT * FROM votes WHERE ref = ? AND ref_id = ? AND user_id = ?');
    $req->execute(['articles', $_GET['id'], $_SESSION['user_id']]);
    $vote = $req->fetch();
    var_dump($vote);
}
?>
<body>
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
</div>
        <form action="minichat_post.php" method="post">
        <p>
        <label for="id_pseudo">Pseudo</label> : </br><input type="text" style="width: 500px; height: 30px" name="id_pseudo" id="id_pseudo" /><br />
        <label for="contenu">Message</label> : </br><textarea name="contenu" type ="text" id="contenu" placeholder="Votre commentaire..."></textarea><br>
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
                <li><?php echo $row['id_pseudo'] ?></li>
                <li><?php echo $row['contenu']?>
                <li><?php echo $row['date'] ?></li>
             <?php
         }

        ?>
</ul>
        </div>
      </div>
</body>
      <?php include 'footer.php'; ?>
