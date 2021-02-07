<?php 
require_once 'header.php'; 
$erreur= null;
var_dump($_POST);
?>
<div id= "container">
    <div id="container_forgot_password">
        <form action="askquestion_post.php" method="POST">
        </br></br></br></br></br></br>
        <?= $erreur ?>
            <h3 class="title-element">Mot de passe oublié ?</h3> 
               </br> Pour des raisons de sécurité,</br> veuillez répondre à votre question secrète pour réinitialiser votre mot de passe :
                </p>
            <div class="form-group">
            <select class="form-input form-select form-control" id="question" name="question" required>
                <option value="" selected>--Selectionner votre question--</option>
                <option value="Quel est le nom de mon premier animal domestique ?">Quel est le nom de mon premier animal domestique ?</option>
                <option value="Quelle est votre couleur préférée ?">Quelle est votre couleur préférée ?</option>
                <option value="Quelle est votre équipe sportive favorite ?">Quelle est votre équipe sportive favorite ?</option>
                <option value="Quel est el pays que j'aimerai le plus visiter ?">Quel est el pays que j'aimerai le plus visiter ?</option>
            </select>
                <input type="text" placeholder="Votre réponse ..." name="reponse" required>
            </div>
            <input type="hidden" value="<?php echo $_POST['mail']; ?>" name="mail">
                <div class="form-group">
	                 <input type="submit" value="Valider votre réponse" name="reset-password">
            </div>
	    </form>
    </div>
</div>
<?php require_once 'footer.php'; ?>