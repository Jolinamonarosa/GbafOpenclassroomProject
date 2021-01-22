<?php 
require_once 'header_user.php';
require_once 'database.php';
$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
$post = $bdd->prepare('SELECT * FROM partenaire WHERE id = ?', [$_GET['id']], 'Article', true);
?>

<h1><?= $post->titre; ?></h1>
<p><?= $post->contenu; ?></p>

<?php require_once 'footer.php'; ?>