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

    if(isset($_GET['u']) && isset($_GET['token']) && !empty($_GET['u']) && !empty($_GET['token'])) {
        $u = htmlspecialchars(base64_decode($_GET['u'])); //u:token utilisateur
        $token = htmlspecialchars(base64_decode($_GET['token']));

        $check = $bdd->prepare('SELECT *FROM password_recover WHERE token_user = ? AND token = ?');
        $check->execute(array($u, $token));
        $row = $check->rowCount();
        $data = $check->fetch(); //si c'est present

        if($row) {
            $get = $bdd->prepare('SELECT confirmation_token FROM membres WHERE token = ?');
            $get->execute(array($u));
            $data_u = $get->fetch();

            if(hash_equals($data_u['token'], $u)) {
                header('Location: password_change.php?u='.base_encode($u));
                die();
            }else {
                echo "Erreur : compte non valide";
            }
    }else {
        echo "Lien non valide";
    }
}