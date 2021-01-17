<?php
require_once 'database.php';
require_once 'authController.php';
?>
<?php require 'header.php'; ?>
<div id= "container">
    <div id="container_forgot_password">
        <form action="forgot.php" method="POST">
        </br></br></br></br></br></br></br></br></br></br></br></br>
            <h4 class="title-element">Mot de passe oublié ?</h4> 
                <p>Pas de panique!</br>
                Veuillez complétez le champs ci-dessous, nous vous enverrons toutes les informations par mail.
                </p>>
            <div class="form-group"> Email : </br>
                <input type="text" name="mail" placeholder="Votre adresse mail..." class="form-control form-control-lg">
            </div>
                <div class="form-group">
	                 <input type="submit" value="Valider" name="forgot-password">
            </div>
	    </form>
    </div>
</div>
<?php require 'footer.php'; ?>