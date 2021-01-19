<?php
require_once 'database.php';
require_once 'header_user.php';

if(isset($_GET['id']) && $_GET['id'] > 0) {
  $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
	$getid = intval($_GET['id']); //securiser la variable, s'il entre plein de texte, on le converti en nombre
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
  $userinfo = $requser->fetch(); //affichage des données

//ajouter un filter_var
  if(isset($_SESSION['id'])) {
      $requser= $bdd->prepare("SELECT * FROM membres WHERE id = ?");
      $requser->execute(array($_SESSION['id']));
      $user = $requser->fetch();

      if(isset($_POST['newpseudo']) && !empty($_POST['newpseudo']) && $_POST['newpseudo'] != $user['pseudo']) {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        header('Location: profil.php?id=' .$_SESSION['id']);
      }

        if(isset($_POST['newmail']) && !empty($_POST['newmail']) && $_POST['newmail']!= $user['mail']) {
          $newmail = htmlspecialchars($_POST['newmail']);
          $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
          $insertmail->execute(array($newmail, $_SESSION['id']));
          header('Location: profil.php?id=' .$_SESSION['id']);
        }

          if(isset($_POST['newmdp1']) && !empty($_POST['newmdp1']) && isset($_POST['newmdp2']) && !empty($_POST['newmdp2'])) {
            $mdp1 = password_hash($_POST['newmdp1'], PASSWORD_BCRYPT);
            $mdp2 = password_hash($_POST['newmdp2'], PASSWORD_BCRYPT);

            if($mdp1 == $mdp2) {
              $insertmdp =  $bbd->prepare("UPDATE membres SET mdp = ? WHERE id = ?");
              $insertmdp->execute(array($mdp1, $_SESSION['id']));
              header('Location: profil.php?id=' .$_SESSION['id']);
            }else {
            $erreur = "Vos deux mots de passe, ne correspondent pas !";
            }
    }
}
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
  $tailleMax= 2097152; //2megaoctet
  $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
  if($_FILES['avatar']['size'] <= $tailleMax) {
    $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)); //mis en minuscule
  //renvoyer l'extension du fichier avec le point, ignorte le premier caractère de la chaine, prend l'extension, tout ce qui vient après le point
    if(in_array($extensionUpload, $extensionsValides)) {
      $chemin = "membre/avatars/" .$_SESSION['id'].".".$extensionUpload;
      $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
      if($resultat) {
        $updateAvatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
        $updateAvatar->execute(array(
          'avatar' => $_SESSION['id'].".".$extensionUpload,
          'id' => $_SESSION['id']
        ));
        header('Location: profil.php');
      }else {
        $erreur = "Erreur durant l'importation de votre photo de profil";
      }
    }else {
      $erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
    }
}else {
    $erreur = "Votre photo de profil ne doit pas dépasser 2Mo";
  }
}


?>
    <div id="container_profil">
    <form action="" method="POST" enctype="multipart/form-data">
    </br></br></br></br></br>
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
    <input type="reponse" style="width: 460px; height: 37px;" name="reponse"  value="<?php echo $userinfo['reponse']; ?>"/>
    </br></br>
    <label><b>Photo de profil :</b></label></br>
    <input type="file" name="avatar" />
    <input type="submit" name="editionprofil" value="Mettre à jour mon profil"/>
    </div>
    </form>
    <?php if(isset($erreur)) { echo $erreur; } ?>
    <?php
    }
	?>
</div>
<br>
<?php require 'footer.php'; ?>