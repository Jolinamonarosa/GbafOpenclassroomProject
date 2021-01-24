<?php
require_once 'database.php';
require_once 'header.php';
if(isset($_GET['id']) && $_GET['id'] > 0) {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
      $getid = intval($_GET['id']); //securiser la variable, s'il entre plein de texte, on le converti en nombre
      $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
      $requser->execute(array($getid));
      $userinfo = $requser->fetch();

$reponse = htmlspecialchars($_POST['reponse']);
$req = $bdd->prepare('SELECT id FROM membres WHERE reponse = :reponse');
$req->execute(array(
    'reponse' => $reponse));
$resultat = $req->fetch(PDO::FETCH_ASSOC);
    if(!$resultat) {
        $erreur = "Réponse incorrecte, veuillez retaper votre réponse, donnée lors de votre inscription";
    }else {
            header('Location: reset_password.php');
    }
?>
<div id= "container">
    <div id="container_forgot_password">
        <form action="" method="POST">
        </br></br></br></br></br></br></br></br></br></br></br></br>
            <h3 class="title-element">Mot de passe oublié ?</h3> 
                <b><?php echo $userinfo['pseudo']; ?></b>,</br> pour des raisons de sécurité,</br> veuillez répondre à votre question secrète pour réinitialiser votre mot de passe :
                </p>
            <div class="form-group">
                <input type="text" name="question" value="<?php echo $userinfo['question']; ?>" disabled="disabled">
                <input type="text" placeholder="Votre réponse ..." name="reponse">
            </div>
                <div class="form-group">
	                 <input type="submit" value="Valider votre réponse" name="forgot-password">
            </div>
	    </form>
        <?php
    }
	?>
    </div>
</div>
<?php require_once 'footer.php'; ?>