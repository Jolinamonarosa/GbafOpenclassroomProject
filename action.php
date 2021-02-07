<?php
require_once 'database.php';
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
if(isset($_GET['t'], $_GET['id']) && !empty($_GET['t']) && !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett=(int) $_GET['t'];

    $sessionid = 4;

    $check = $bdd->prepare('SELECT id FROM partenaire WHERE id = ?');
    $check->execute(array($getid));

    if($check->rowCount() == 1) {
        if($gett == 1) {
        $check_like = $bdd->prepare('SELECT id FROM likes WHERE id_partenaire = ? AND id_membres = ?');
        $check_like->execute(array($getid, $sessionid));

        $del = $bdd->prepare('DELETE FROM dislikes WHERE id_partenaire = ? AND id_membres = ?');
        $del->execute(array($getid, $sessionid));

            if($check_like->rowCount() == 1) {
                $del = $bdd->prepare('DELETE FROM likes WHERE id_partenaire = ? AND id_membres = ?');
                $del->execute(array($getid, $sessionid));
            }else {
                $ins = $bdd->prepare('INSERT INTO likes (id_partenaire, id_membres) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }
                }elseif($gett == 2) {
                        $check_like = $bdd->prepare('SELECT id FROM dislikes WHERE id_partenaire = ? AND id_membres = ?');
                        $check_like->execute(array($getid, $sessionid));
                        if($check_like->rowCount() == 1) {
                            $del = $bdd->prepare('DELETE FROM dislikes WHERE id_partenaire = ? AND id_membres = ?');
                            $del->execute(array($getid, $sessionid));
                        }
                    }else {
                        $ins = $bdd->prepare('INSERT INTO dislike (id_partenaire, id_membres) VALUES (?, ?)');
                        $ins->execute(array($getid, $sessionid));
                    }
        header('Location:article.php?id=' .$getid);
    }else {
        exit('Erreur fatale');
    }
}else {
    exit('Erreur fatale');
}