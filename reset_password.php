<?php require_once 'header.php'; ?>
<div id="container">
    <div id="container_forgot_password">
        <form action="" method="POST">
            </br></br></br></br></br></br>
            <?= $errorMessage ?>
            <h3>Réinitialisation de votre mot de passe :</h3>
        <div class="form-group">
            <label for="password">Votre nouveau mot de passe :</label>
            <input type="password" placeholder="Entrez votre nouveau mot de passe" name="newmdp1"/><br/>
        </div>
            <div class="form-group">
                <label for="password">Confirmation du nouveau mot de passe :</label>
                <input type="password" placeholder="Confirmez votre nouveau mot de passe" name="newmdp2"/><br/>
            </div>
            <div class="form-group">
            <input type="hidden" value="<?= $mail ?>" name="mail">
                <input type="submit" value="Réinitialisation" name="reset-password-btn"/>
            </div>
        </form>
    </div>
</div>
<?php require_once 'footer.php'; ?>