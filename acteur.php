<?php
include_once 'database.php';

if(isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];

    $check = $bdd->prepare('SELECT id FROM articles WHERE id = ?');
    $check->execute(array($getid));

    if($check->rowCount() == 1) {
        if($gett == 1) {
            $insert = $bdd->prepare('INSERT INTO likes (id_article) VALUES (?)');
            $insert->execute(array($getid));
        }elseif($gett == 2) {
            $insert = $bdd->prepare('INSERT INTO dislikes (id_article) VALUES (?)');
            $insert->execute(array($getid));
        }
        header('Location: http://localhost/gbaf/minichat.php?id=' . $getid);
    } else {
        exit('Erreur fatale');
    }
} else {
    exit('Erreur fatale. <a href= "accueil.php">Revenir à laccueil</a>)');
}
