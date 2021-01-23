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
        $req->closeCursor();
    }
    function addComment($idpseudo, $idpartenaire, $comment) {
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        $req = $bdd->prepare('INSERT INTO commentaires (id_pseudo, id_partenaire, comment, date) VALUES (:id_pseudo, :id_partenaire, :comment, NOW())');
        $req->execute(array(
        'id_pseudo'=>$idpseudo, 
        'id_partenaire'=>$idpartenaire, 
        'comment'=>$comment));
        $req->closeCursor();
    }
}
//reccupère commentaire d'un article
function getComments($id) {
    if(isset($_POST['id_pseudo'], $_POST['comment']) && !empty($_POST['id_pseudo']) && !empty($_POST['comment'])) {
        $pseudo = htmlspecialchars(addslashes($_POST['id_pseudo']));
        $comment = htmlspecialchars(addslashes($_POST['comment']));
        date_default_timezone_set ('Europe/Paris');
        $date = date('d/m/Y à H:i:s');
    
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        $req = $bdd->prepare('INSERT INTO commentaires (id_pseudo, comment, date)
        VALUES(:id_pseudo, :comment, NOW())');
        $req->execute(array(
            'id_pseudo'=>$pseudo,
            'comment'=>$comment));
    }
}