<?php
include_once 'database.php';
require_once 'authController.php';
?>
  <body>
     <?php require 'header.php'; ?>
      <div id="container">
            <form action="forgot_password.php" method="POST">
                <h4 class="title-element">Mot de passe oublié ?</h4> 
                <p>Pas de panique!</br>
                Veuillez complétez le champs ci-dessous, nous vous enverrons toutes les informations par mail.
                </p>>
                <div class="alert alert-danger">
                </div>
                <div class="form-group"> Email : </br>
                    <input type="text" name="mail" placeholder="Votre adresse mail..." class="form-control form-control-lg">
                </div>
                <div class="form-group">
	                 <input type="submit" value="Valider" name="forgot-password">
                </div>
	        </form>
      </div>
      <?php require 'footer.php'; ?>