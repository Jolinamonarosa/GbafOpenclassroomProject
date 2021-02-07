<?php 
require 'header.php'; 
$erreur= null;
?>
    <form action="forgot_password_post.php" method="POST">
        </br></br></br></br></br></br></br></br>
        <?= $erreur ?>
        <div class="listing">
            <div class="content">
            <h4 class="title-element">Mot de passe oublié ?</h4> 
                <p>Pas de panique!</br>
                <b>Veuillez entrer votre mail :</b>
                </p>
            <div class="form-group">
            <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                <input type="email" name="mail" placeholder="Votre email..." class="form-control form-control-lg">
            </div>
                <div class="form-group">
	                 <input type="submit" value="Valider" name="forgot-password">
                </div>
	    </form>
            </div>
        </div>
<?php require 'footer.php'; ?>