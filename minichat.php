<?php
$msg = null;
require_once 'auth.php';
require_once 'functions.php';
forcer_utilisateur_connecte();
$coms = getComs();
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
$getid = intval($_GET['id']);
$requser = $bdd->prepare('SELECT * FROM membre WHERE id = ?');
$requser->execute(array(2));
$userinfo = $requser->fetch();

  if(isset($_GET['id']) && !empty($_GET['id'])) {
      $getid = htmlspecialchars($_GET['id']);
      $partenaire = $bdd->prepare('SELECT * FROM partenaire WHERE id = ?');
      $partenaire->execute(array($getid));
      $partenaire = $partenaire->fetch();

      if($coms >= 1){
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
                $msg = "Votre commentaire a bien été posté !";
            }else {
                $msg = "Tous les champs doivent être complétés !";
            }
        }
        $msg = "Vous avez déjà posté un commentaire !";
    }
}
?>
<div class="listing">
        <div class="content">
    <form action="" method="POST">
    <?= $msg ?> <br/><br/>
    <input type="text" name="id_pseudo" value="<?php echo $userinfo['pseudo']; ?>"></input><br/>
        <textarea name="comment" id="comment" placeholder="Votre commentaire..."></textarea></p>
        <input type="hidden" value="<?= $partenaire ?>" name="">
        <input type="submit" name="submit_comment"></input>
    </form>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-8">
            <?php foreach($coms as $com): ?>
                <div class="content">
                    <a href="#"><b><?= $com->id_pseudo ?></b></a>
                    <p>a commenté</p>
                    <h2><?= $com->comment ?></h2>
                    <?= $com->date ?><br/><br/>

                </div>
            </div>
        </div>
            <?php endforeach; ?>
</div>