<?php
require_once 'database.php';
$erreur = null;
if(isset($_POST['pseudo']) && isset($_POST['mdp'])) {
  $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
  $pseudo = htmlspecialchars($_POST['pseudo']); 
  $password = htmlspecialchars($_POST['mdp']);
  $req = $bdd->prepare('SELECT id, mdp FROM membre WHERE pseudo = :pseudo');
  $req->execute(array(
    'pseudo' => $pseudo));
  $resultat = $req->fetch(PDO::FETCH_ASSOC);
  if(!$resultat) {
    $erreur = "Identifiant ou mot de passe incorrect !";
  }else {
    $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);
      if($isPasswordCorrect) {
        session_start();
        $_SESSION['connecte'] = 1;
        $_SESSION['id'] = $resultat['id'];
        header('Location: accueil.php?id=2');
      exit();
      }
      require_once 'auth.php';
          if(est_connecte()) {
            header('Location: accueil.php');
          exit();
            }else {
              $erreur = "Identifiant ou mot de passe incorrect !";
          }
        }
  }
?>
<?php require 'header.php'; ?>
      <div id="container_profil">
          <form action="" method="POST">
            <br/><br/> <br/><br/><br/><br/> <br/><br/><br/><br/> <br/><br/>
          <?= $erreur ?>
          <div class="listing">
              <div class="content">
                <div class="champs">
                  <label><b>Nom d'utilisateur :</b></label>
                  <input type="text" placeholder="Entrer votre nom d'utilisateur" name="pseudo" required>
                  </div>
                  <div class="champs">
                  <label><b>Mot de passe :</b></label>
                  </div>
                  <div class="champs">
                  <input type="password" placeholder="Entrer votre mot de passe" name="mdp" required>
                  <div class="champs">
                  <a href="forgot_password.php">Mot de passe oublié?</a>
                  <input type="submit" id='submit' value='CONNEXION' >
            <a href="inscription.php">Pas encore inscrit? Inscrivez-vous</a>
            </form>
          </div>
            </div>
          </div> 
  <?php require 'footer.php'; ?>