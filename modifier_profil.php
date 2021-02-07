<?php
session_start();
$erreur = null;
require_once 'header_user.php';
if(!isset($_SESSION['id']))
header('Location:accueil.php');
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  
  $req = $bdd ->prepare('SELECT * FROM membre WHERE id');
  $req->execute(array('id'=>$id));
  
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}


  ?>
<a href="accueil.php?id=2" class="nav-link"><img src="https://img.icons8.com/wired/64/000000/long-arrow-left.png"/></a>
    <div id="container_profil">
    <form action="" method="POST" enctype="multipart/form-data">
    </br></br></br>
    <?php
while ($resultat = $req->fetch()) {
    ?>
      <h1>Mon profil</h1>
      <div class="champs">
        <label for="pseudo"><b>Pseudo :</b><span class="ast">*</span></label>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo $resultat['pseudo']; ?>">
      </div>
      </br>
      <div class="champs">
        <label for="mail"><b>Email :</b><span class="ast">*</span></label>
        <input type="email"  style="width: 460px; height: 43px;" id="mail" name="mail" value="<?php echo $resultat['mail']; ?>" >
      </div>
      </br>
      <div class="champs">
        <label for="mdp1"><b>Mot de passe :</b><span class="ast">*</span></label>
        <input type="password" id="mdp1" placeholder="Votre mot de passe" name="mdp1">
      </div>
      </br>
      <div class="champs">
        <label for="mdp2"><b>Confirmation du mot de passe :</b><span class="ast">*</span></label>
        <input type="password" id="mdp2" placeholder="Confirmer votre mot de passe" name="mdp2">
      </div>
      </br>
      <div class="champs">
      <div class="form-input form-group">
        <label for="question"><b>Question secrète :</b><span class="ast">*</span></label>
      </br>
    <select class="form-input form-select form-control" id="question" name="question">
      <option value="" selected>--Selectionner une question--</option>
      <option value="Quel est le nom de mon premier animal domestique ?">Quel est le nom de mon premier animal domestique ?</option>
      <option value="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>
      <option value="Quelle est votre équipe sportive favorite ?">Quelle est votre équipe sportive favorite ?</option>
      <option value="Quel est el pays que j'aimerai le plus visiter ?">Quel est el pays que j'aimerai le plus visiter ?</option>
    </select>
    </div>
    </div>
</br>
    <div class="champs">
    <label><b>Réponse à la question secrète :</b><span class="ast">*</span></label>
    <input type="reponse" style="width: 460px; height: 37px;" name="reponse"  value="<?php echo $resultat['reponse']; ?>"/>
    </br></br>
    <label><b>Photo de profil :</b></label></br>
    <input type="file" name="avatar" />
    <input type="submit" name="editionprofil" value="Mettre à jour mon profil"/>
    </div>
    <p> <?php echo $erreur ; ?></p>
    </form>
  <br/><br/><a href="profil.php">Retour a la page profil</a>
  <?php
}
}
?>
</div>
<br>
<?php require 'footer.php'; ?>
if(isset($_POST['newpseudo']) && !empty($_POST['newpseudo']) && $_POST['newpseudo'] != $userinfo['pseudo']) {
          $newpseudo = htmlspecialchars($_POST['newpseudo']);
          $insertpseudo = $bdd->prepare("UPDATE membre SET pseudo = :newpseudo WHERE id = :id");
          $insertpseudo->execute(array(
            'newpseudo' => $newpseudo,
            'id' => $id));
            $user = $requser->fetch();

          if(isset($_POST['newmail']) && !empty($_POST['newmail']) && $_POST['newmail']!= $userinfo['mail']) {
            $newmail = htmlspecialchars($_POST['newmail']);
            $insertmail = $bdd->prepare("UPDATE membre SET mail = :newmail WHERE id = :id");
            $insertmail->execute(array(
              'newmail' => $newmail, 
              $_SESSION['id']));
              $user = $requser->fetch();

            if(isset($_POST['newmdp1']) && !empty($_POST['newmdp1']) && isset($_POST['newmdp2']) && !empty($_POST['newmdp2'])) {
              $mdp1 = password_hash($_POST['newmdp1'], PASSWORD_DEFAULT);
              $mdp2 = password_hash($_POST['newmdp2'], PASSWORD_DEFAULT);

                if($mdp1 == $mdp2) {
                  $insertmdp =  $bbd->prepare("UPDATE membre SET mdp = :mdp1 WHERE id = :id");
                  $insertmdp->execute(array(
                    'mdp1' => $mdp1, 
                    $_SESSION['id']));
                    $user = $requser->fetch();
             
                  if(isset($_POST['newquestion']) && !empty($_POST['newquestion']) && $_POST['newquestion']!= $userinfo['question']) {
                    $newquestion = htmlspecialchars($_POST['newquestion']);
                    $insertquestion = $bdd->prepare("UPDATE membre SET question = :newquestion WHERE id = :id");
                    $insertquestion->execute(array(
                      'newquestion' => $question, 
                      $_SESSION['id']));
                      $user = $requser->fetch();

                    if(isset($_POST['newreponse']) && !empty($_POST['newreponse']) && $_POST['newreponse']!= $userinfo['reponse']) {
                      $newreponse = htmlspecialchars($_POST['newreponse']);
                      $insertreponse = $bdd->prepare("UPDATE membre SET reponse = :newreponse WHERE id = :id");
                      $insertreponse->execute(array(
                        'newreponse' => $reponse, 
                        $_SESSION['id']));
                        $user = $requser->fetch();
                      header('Location: profil.php?id=' .$_SESSION['id']);
               
                 }
                  }
                }
          }
      }