<?php 
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

if(isset($_POST['mail']) && !empty($_POST['mail'])){
    $email = htmlspecialchars($_POST['email']);

    $check = $bdd->prepare('SELECT token FROM membres WHERE mail = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if($row){
        $token = bin2hex(openssl_random_pseudo_bytes(24));
        $token_user = $data['token'];

        $insert = $bdd->prepare('INSERT INTO password_recover(token_user, token) VALUES(?,?)');
        $insert->execute(array($token_user, $token));

        $link = 'recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);

        echo "<a href='$link'>Lien</a>";
    }else{
        echo "Compte non existant";
        #header('Location: ../index.php');
        #die();
    }
}