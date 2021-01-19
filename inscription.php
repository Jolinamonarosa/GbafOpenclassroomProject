<?php require_once 'database.php'; ?>
  <?php require 'header.php'; ?>
    <div id="container_inscription">
      <form action="verif_inscription.php" method="POST">
      </br></br></br></br>
          <h1>Inscription</h1>
            <b>Civilité :</b><br/>
            <input type="radio" name="civi2" value="Mme" /> Madame
            <input type="radio" name="civi2" value="Mr" checked="checked" /> Monsieur
            </br></br>
        <div class="champs">
          <label for="pseudo"><b>Pseudo :</b><span class="ast">*</span></label>
          <input type="text" placeholder="Entrer votre pseudo" id="pseudo" name="pseudo" required>
        </div>
          <div class="champs">
            <label for="nom"><b>Nom :</b><span class="ast">*</span></label>
            <input type="text" placeholder="Entrer votre nom" id="nom" name="nom" required>
          </div>
            <div class="champs">
              <label for="prenom"><b>Prénom :</b><span class="ast">*</span></label>
              <input type="text" placeholder="Entrer votre prénom" id="prenom" name="prenom" required>
            </div>
              <div class="champs">
                <label for="mail"><b>Email :</b><span class="ast">*</span></br></label>
                <input type="email"  style="width: 452px; height: 35px;" placeholder="Entrer votre email" id="mail" name="mail" required>
              </div>
              </br>
                <div class="champs">
                  <label for="mdp"><b>Mot de passe :</b><span class="ast">*</span></label>
                  <input type="password" placeholder="Entrer votre mot de passe" id="mdp" name="mdp" required>
                </div>
                  <div class="champs">
                    <label for="mdp2"><b>Confirmation du mot de passe :</b><span class="ast">*</span></label>
                    <input type="password" placeholder="Confirmer votre mot de passe" id="mdp2" name="mdp2" required>
                  </div>
                    <div class="champs">
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
                    </div>
                  </br>
                        <div class="champs">
                          <label><b>Réponse à la question secrète :</b><span class="ast">*</span></br></label>
                          <input type="reponse" style="width: 452px; height: 35px;" placeholder="Votre réponse" name="reponse" />
                          <input type="submit" name="forminscription" value="je m'inscris" />
                        </div>
      <p>Tout les champs avec un * sont obligatoire !<p>
      </form>
    </div>
  <br>
<?php require 'footer.php'; ?>