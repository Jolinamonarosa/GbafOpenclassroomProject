<?php
//fonction qui reccupère tous les articles
function getArticles() {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT id, logo, titre, extrait FROM partenaire ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

//fonction qui reccupère un article
function getArticle($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $req = $bdd->prepare('SELECT * FROM partenaire WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }else {
        header('Location: accueil.php');
    }
}