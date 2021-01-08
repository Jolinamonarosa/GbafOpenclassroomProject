<?php 
require_once 'header.php';
require_once 'functions.php';
require_once 'authController.php';
?>
<body>

<div class="container">
    <div class="row">
	<form action="reset_password.php" method="post">
    <h3>Réinitialisation de votre mot de passe :</h3>
    <label for="password">Votre nouveau mot de passe :</label>
	   <input type="password" placeholder="Votre nouveau mot de passe" name="password"/><br/>
    <label for="password">Confirmation du nouveau mot de passe :</label>
	   <input type="password" placeholder="Confirmation de votre nouveau mot de passe" name="passwordConf"/><br/>
	   <input type="submit" value="Réinitialisation" name="reset-password-btn"/>
	</form>
</div>
    </div>
<?php require 'footer.php'; ?>