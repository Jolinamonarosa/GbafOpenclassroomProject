<?php 
require_once 'database.php';
try
{
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $bdd;
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['password'])  && isset($_POST['password_repeat']) && isset($_POST['token'])) {
    if(!empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['token'])) {
        $password = htmlspecialchars($_POST['password']);
        $password_repeat = htmlspecialchars($_POST['password_repeat']);
        $token = htmlspecialchars($_POST['token']);

        $check = $bdd->prepare('SELECT * FROM membres WHERE confirmation_token = ?');
        $check->execute(array($token));
        $row = $check->rowCount();

        if($row) {
            if($password === $password_repeat) {
                $cost = ['cost' => 12];
                $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                $update = $bdd->prepare('UPDATE membres SET password = ? WHERE confirmation_token =?');
                $update ->execute(array($token));

                $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                $delete->execute(array($token));

                echo "Le mot de passe a bien été modifié";

            }else{
                echo "Les mots de passes ne sont pas identiques";
            }
        }else{
            echo "Compte non existant";
        }
    }else{
        echo "Merci de renseigner un mot de passe";
    }
}else{
    echo "Merci de renseigner un mot de passe";
}