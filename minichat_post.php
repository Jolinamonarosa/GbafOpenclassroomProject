<?php
include_once 'database.php';
include 'minichat.php';

if(isset($_POST['id_pseudo'], $_POST['contenu']) && !empty($_POST['id_pseudo']) && !empty($_POST['contenu'])) {
    $pseudo = htmlspecialchars(addslashes($_POST['id_pseudo']));
    $contenu = htmlspecialchars(addslashes($_POST['contenu']));
    date_default_timezone_set ('Europe/Paris');
    $date = date('d/m/Y à H:i:s');

    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $req = $bdd->prepare('INSERT INTO articles(id_pseudo, contenu, date)
    VALUES(:id_pseudo, :contenu, NOW())');
    $req->execute(array(
        'id_pseudo'=>$pseudo,
        'contenu'=>$contenu));

    header('Location:minichat.php');
}
?>