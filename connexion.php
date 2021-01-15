<?php
require_once 'database.php';
if(isset($_POST['pseudo']) & isset($_POST['mdp'])) {
  $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
  $erreur = null;
  $pseudo = htmlspecialchars($_POST['pseudo']); 
  $password = htmlspecialchars($_POST['mdp']);
  $req = $bdd->prepare('SELECT id, mdp FROM membres WHERE pseudo = :pseudo');
  $req->execute(array(
    'pseudo' => $pseudo));
  $resultat = $req->fetch(PDO::FETCH_ASSOC);
  $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['mdp']);
  if(!$resultat) {
    $erreur = "Identifiants incorrects";
  }else {
      if($isPasswordCorrect) {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: accueil.php');
      exit();
      }
      require_once 'auth.php';
          if(est_connecte()) {
            header('Location: accueil.php');
          exit();
          }else {
            $erreur = "Identifiants incorrects";
          }
  }
}
?>
<body>
      <?php include 'header.php' ?>
    <main>
        <div id="container">
    <?php if ($erreur): ?>
    <div class="alert alert-danger">
      <?= $erreur ?>
    </div>
    <?php endif ?>
            <form action="" method="POST">
                <label><b>Nom d'utilisateur :</b></label>
                <input type="text" placeholder="Entrer votre nom d'utilisateur" name="pseudo" required>
                <label><b>Mot de passe :</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="mdp" required>
                <a href="forgot_password.php">Mot de passe oublié?</a>
                <input type="submit" id='submit' value='CONNEXION' >
            <a href="inscription.php">Pas encore inscrit? Inscrivez-vous</a>
            </form>
      </div>
    </main>
  <?php include 'footer.php'; ?>