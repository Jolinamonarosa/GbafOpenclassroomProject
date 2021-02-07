<?php
require_once 'database.php';
$errorMessage=null;
if(isset($_POST['reset-password-btn'])) {
    if(isset($_POST['newmdp1'], $_POST['newmdp2'])) {
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        $newmdp1 = htmlspecialchars($_POST['newmdp1']);
        $newmdp2 = htmlspecialchars($_POST['newmdp2']);
        if(!empty($newmdp1) && !empty($newmdp2)) {
            if($newmdp1 == $newmdp2) {
                $pass_hache = password_hash($_POST['newmdp1'], PASSWORD_DEFAULT);
                $pass_hache = password_hash($_POST['newmdp2'], PASSWORD_DEFAULT);
                $password_update = $bdd->prepare("UPDATE membre SET mdp = :newmdp1 WHERE mail = :mail");
                $password_update->execute(array(
                'newmdp1'=>$pass_hache));
                header('Location: connexion.php');
            }else {
                $errorMessage="Vos mots de passes ne correspondent pas !";
            }
        }else {
            $errorMessage="Veuillez remplir tous les champs !";
        }
    }else {
        $errorMessage="veuillez remplir tous les champs !";
    }
}