<?php
session_start();
$id = $_SESSION['id'];
$erreur = null;
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');

require_once 'header_user.php';

if(isset($_GET['id']) && $_GET['id'] > 0) {
	$requser = $bdd->prepare('SELECT * FROM membre WHERE id = :id');
	$requser->execute(array(
    'id' => $id));
  $userinfo = $requser->fetch();

  if (isset($_POST['editionprofil']) ){
    if((!empty($_POST['newpseudo'])) && (!empty($_POST['newmail'])) && (!empty($_POST['newmdp1']))  && (!empty($_POST['newmdp2']))&& (!empty($_POST['newquestion'])) && (!empty($_POST['newreponse']))) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $newmail = htmlspecialchars($_POST['newmail']);
      $mdp1 = password_hash($_POST['newmdp1'], PASSWORD_DEFAULT);
      $mdp2 = password_hash($_POST['newmdp2'], PASSWORD_DEFAULT);
      $newquestion = htmlspecialchars($_POST['newquestion']);
      $newreponse = htmlspecialchars($_POST['newreponse']);

        $reqprepare= $bdd->prepare("UPDATE membre SET pseudo = :newpseudo, mail = :newmail, mdp = :newmdp1, question = :newquestion, reponse = :newreponse WHERE id= :id");
        $reqprepare ->execute(array(
                  'newpseudo'=>$_POST['newpseudo'], 
                  'newmail'=>$_POST['newmail'], 
                  'newmdp1'=>$_POST['newmdp1'],
                  'newquestion'=>$_POST['newquestion'], 
                  'newreponse'=>$_POST['newreponse'],
                  'id'=>$id));
      echo '<br/><br/> Informations modifiées avec succès <br/>';
    }
  }else {
    echo 'Vous devez remplir tous les champs !';
  }
}
?>
<a href="accueil.php?id=2" class="nav-link"><img src="https://img.icons8.com/wired/64/000000/long-arrow-left.png"/></a>
    <div id="container_profil">
    <form action="" method="POST" enctype="multipart/form-data">
    </br></br></br>
      <h1>Mon profil</h1>
      <div class="champs">
        <label for="pseudo"><b>Pseudo :</b><span class="ast">*</span></label>
        <input type="text" id="pseudo" name="newpseudo" value="<?php echo $userinfo['pseudo']; ?>">
      </div>
      </br>
      <div class="champs">
        <label for="mail"><b>Email :</b><span class="ast">*</span></label>
        <input type="email"  style="width: 460px; height: 43px;" id="mail" name="newmail" value="<?php echo $userinfo['mail']; ?>" >
      </div>
      </br>
      <div class="champs">
        <label for="mdp1"><b>Mot de passe :</b><span class="ast">*</span></label>
        <input type="password" id="mdp1" placeholder="Votre mot de passe" name="newmdp1">
      </div>
      </br>
      <div class="champs">
        <label for="mdp2"><b>Confirmation du mot de passe :</b><span class="ast">*</span></label>
        <input type="password" id="mdp2" placeholder="Confirmer votre mot de passe" name="newmdp2">
      </div>
      </br>
      <div class="champs">
      <div class="form-input form-group">
        <label for="question"><b>Question secrète :</b><span class="ast">*</span></label>
      </br>
    <select class="form-input form-select form-control" id="question" name="newquestion"value="<?php echo $userinfo['question']; ?>" >
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
    <input type="reponse" style="width: 460px; height: 37px;" name="newreponse"  value="<?php echo $userinfo['reponse']; ?>"/>
    </br></br>
    <label><b>Photo de profil :</b></label></br>
    <input type="file" name="avatar" />
    <input type="submit" name="editionprofil" value="Mettre à jour mon profil"/>
    </div>
    <p> <?php echo $erreur; ?></p>
    </form>
</div>
<br>
<?php require 'footer.php'; ?>