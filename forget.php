<?php
include_once 'database.php';?>
  <body>
     <?php require 'header.php'; ?>
      <div id="container">
            <form action="recuperation.php" method="POST">
            <h4 class="title-element">Mot de passe oublié ?</h4> <p>Pas de panique!</br>
                Veuillez complétez les champs ci-dessous, puis nous vous enverrons toutes les informations par mail.
                </p>
	<?php if($section == 'code') { ?>
	Un code de vérification vous a été envoyé par mail: <?= $_SESSION['recup_mail'] ?>
	<br/>
	<form method="post">
	   <input type="text" placeholder="Code de vérification" name="verif_code"/><br/>
	   <input type="submit" value="Valider" name="verif_submit"/>
	</form>
	<?php } elseif($section == "changemdp") { ?>
	Nouveau mot de passe pour <?= $_SESSION['recup_mail'] ?>
	<form method="post">
	   <input type="password" placeholder="Nouveau mot de passe" name="change_mdp"/><br/>
	   <input type="password" placeholder="Confirmation du mot de passe" name="change_mdp"/><br/>
	   <input type="submit" value="Valider" name="change_submit"/>
	</form>
	<?php } else { ?>
	<form method="post">
	   <input type="email" placeholder="Votre adresse mail" name="recup_mail"/><br/>
	   <input type="submit" value="Valider" name="recup_submit"/>
	</form>
	<?php } ?>
	<?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; } ?>
      </div>
      <?php require 'footer.php'; ?>