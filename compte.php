<?php
include_once 'database.php'
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Compte utilisateur</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
  </head>

  <body>
      <header>
  <?php include 'header.php' ?>
      </header>
    <div id="container">
    <form action="verif_inscription.php" method="POST">
      <h1>Mon Compte</h1>
      <label for="pseudo"><b>Pseudo :</b><span class="ast">*</span></label>
      <input type="text" placeholder="Entrer votre pseudo" id="pseudo" name="pseudo" required>

      <label for="nom"><b>Nom :</b><span class="ast">*</span></label>
      <input type="text" placeholder="Entrer votre nom" id="nom" name="nom" required>

      <label for="prenom"><b>Prénom :</b><span class="ast">*</span></label>
      <input type="text" placeholder="Entrer votre prénom" id="prenom" name="prenom" required>

      <label for="mail"><b>Email :</b><span class="ast">*</span></br></label>
      <input type="email"  style="width: 547px; height: 35px;" placeholder="Entrer votre email" id="mail" name="mail" required>
  </br></br>
      <label for="mdp"><b>Mot de passe :</b><span class="ast">*</span></label>
      <input type="password" placeholder="Entrer votre mot de passe" id="mdp" name="mdp" required>

      <div class="form-input form-group">
      <label for="question"><b>Question secrète :</b><span class="ast">*</span></label>
</br>
    <select class="form-input form-select form-control" id="question" name="question" required>
      <option value="" selected>--Selectionner une question--</option>
      <option value="Quel est le nom de mon premier animal domestique ?">Quel est le nom de mon premier animal domestique ?</option>
      <option value="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>
      <option value="Quelle est votre équipe sportive favorite ?">Quelle est votre équipe sportive favorite ?</option>
      <option value="Quel est el pays que j'aimerai le plus visiter ?">Quel est el pays que j'aimerai le plus visiter ?</option>
    </select>
</div>
</br>
    <label><b>Réponse :</b><span class="ast">*</span></br></label>
    <input type="reponse" style="width: 547px; height: 35px;" placeholder="Votre réponse" name="reponse" />
    <input type="submit" name="forminscription" value="MODIFIER" />
    </form>
</div>
<br>
<?php include 'footer.php' ?>
  </body>
</html>