<?php
session_start();
require_once 'database.php';
$msg = null;
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
  if(isset($_GET['id']) && !empty($_GET['id'])) {
      $getid = htmlspecialchars($_GET['id']);
      $partenaire = $bdd->prepare('SELECT * FROM partenaire WHERE id = ?');
      $partenaire->execute(array($getid));
      $partenaire = $partenaire->fetch();

        if(isset($_POST['submit_comment'])) {
            if(isset($_POST['id_pseudo'], $_POST['comment']) && !empty($_POST['id_pseudo']) && !empty($_POST['comment'])) {
                $pseudo = htmlspecialchars($_POST['id_pseudo']);
                $comment = htmlspecialchars($_POST['comment']);
                date_default_timezone_set ('Europe/Paris');
                $date = date('d/m/Y à H:i:s');
                $insert = $bdd->prepare('INSERT INTO commentaires (id_partenaire, id_pseudo, comment, date)
                VALUES(:id_partenaire, :id_pseudo, :comment, NOW())');
                $insert->execute(array(
                    'id_partenaire'=>$partenaire,
                    'id_pseudo'=>$pseudo,
                    'comment'=>$comment));
                    $result = $insert->fetch();
                $msg="Votre commentaire a bien été posté !";
            }else {
                $msg="Tous les champs doivent être complétés !";
                }
        }
    }
?>
<div class="listing">
        <div class="content">
    <form action="" method="POST">
    <?= $msg ?> <br/><br/>
    <input type="text" name="id_pseudo" value="<?= $pseudo ?>"></input><br/>
        <textarea name="comment" id="comment" placeholder="Votre commentaire..."></textarea></p>
        <input type="hidden" value="<?= $partenaire ?>" name="">
        <input type="submit" name="submit_comment"></input>
    </form>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card card-white post">
                <div class="post-heading">
                    <div class="float-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="float-left meta">
                        <div class="title h5">
                        <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
                            $sql = ('SELECT id_pseudo, comment, date FROM commentaires');
                            $req = $bdd->query($sql);
                            while($row =$req->fetch()){
                                ?>
                            <a href="#"><b><?php echo $row['id_pseudo']; ?></b></a>
                            <p>a commenté</p>
                        </div>
                        <h6 class="text-muted time"><?php echo $row['date']; ?></h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p><?php echo $row['comment']; ?></p>
                    <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>