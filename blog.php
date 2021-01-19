<?php 
require_once 'header_user.php';

if(isset($_GET['id']) && !empty($_POST['id'])) {
    $sql = "SELECT * FROM blog WHERE id=" . $_GET["id"];
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $req = $bdd->prepare($sql);
    $req = $bdd->query($sql);
    $blog = $req->fetch();
    echo $blog['titre'];
}else {
    header('Location: article_post.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Header utilisateur</title>
    <link rel="stylesheet" href="style.css" media="screen"/>
  </head>
    <a href="">Retour vers la liste des acteurs et partenaires</a>
    <h1><?php echo $blog['titre']; ?></h1>
    <p><?php echo $blog['paragraphe']; ?></p>


<?php require_once 'footer.php'; ?>