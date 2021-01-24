<?php
require_once 'database.php';
require 'header.php';
$erreur = null;
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
$pseudo = htmlspecialchars($_POST['pseudo']);
$req = $bdd->prepare('SELECT id FROM membres WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $pseudo));
$resultat = $req->fetch(PDO::FETCH_ASSOC);
    if(!$resultat) {
        $erreur = "Compte inexistant, veuillez recommencer !";
    }else {
            header('Location: askquestion.php');
    }
?>
<div id= "container">
    <div id="container_forgot_password">
        <form action="" method="POST">
        </br></br></br></br></br></br></br></br></br></br></br></br>
            <h4 class="title-element">Mot de passe oublié ?</h4> 
                <p>Pas de panique!</br>
                <b>Veuillez entrer votre pseudo :</b>
                </p>
            <div class="form-group">
                <input type="text" name="pseudo" placeholder="Votre pseudo..." class="form-control form-control-lg">
            </div>
                <div class="form-group">
	                 <input type="submit" value="Valider" name="forgot-password">
            </div>
	    </form>
    </div>
</div>
<?php require 'footer.php'; ?>