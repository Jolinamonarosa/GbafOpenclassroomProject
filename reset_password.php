<?php
require_once 'database.php';
require_once 'header.php';
if(isset($_POST['reset-password-btn'])){
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $newmdp1 = htmlspecialchars($_POST['newmdp1']);
    $newmdp2 = htmlspecialchars($_POST['newmdp2']);
    if((!empty($newmdp1)) && (!empty($newmdp2))) {
        if($newmdp1 != $newmdp2){
            $errorMessage="Vos mots de passe ne correspondent pas !";
            if($newmdp1 == $newmdp2) {
                $pass_hache = password_hash($_POST['newmdp1'], PASSWORD_DEFAULT);
                $pass_hache = password_hash($_POST['newmdp2'], PASSWORD_DEFAULT);

                $password_update = $pdo->prepare("UPDATE membres SET mdp ='newmdp1' WHERE id = ?");
                $password_update->execute([
                    'newmpd1' => $pass_hache,
                    'id' => $id]);
                    header('Location: connexion.php');
            }
                }else {
                    $errorMessage="Veuillez remplir tous les champs !";
                } 
        }
}
?>

<div id="container">
    <div id="container_forgot_password">
        <form action="" method="POST">
        </br></br></br></br></br></br></br></br></br></br></br></br>
        <h3>Réinitialisation de votre mot de passe :</h3>
        <div class="form-group">
        <label for="password">Votre nouveau mot de passe :</label>
        <input type="password" placeholder="Votre nouveau mot de passe" name="newmdp1"/><br/>
        </div>
            <div class="form-group">
            <label for="password">Confirmation du nouveau mot de passe :</label>
            <input type="password" placeholder="Confirmation de votre nouveau mot de passe" name="newmdp2"/><br/>
            </div>
            <div class="form-group">
            <input type="submit" value="Réinitialisation" name="reset-password-btn"/>
            </div>
        </form>
    </div>
</div>
<?php require_once 'footer.php'; ?>