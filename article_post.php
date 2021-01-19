<?php 
require_once 'database.php';
require_once 'header_user.php';

if(isset($_POST['titre'], $_POST['paragraphe']) && !empty($_POST['titre']) && !empty($_POST['paragraphe'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $paragraphe = htmlspecialchars($_POST['paragraphe']);
    $datenow = date("Y-m-d H:i:s");

    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $req = $bdd->prepare("INSERT INTO blog (titre, paragraphe, date_publication) VALUES (:titre, :paragraphe, :date_publication)");
    $req->execute(array(
        'titre'=>$titre,
        'paragraphe'=>$paragraphe,
        'date_publication'=>$datenow));

    Header('Location: article_post.php');
}
?>
<br/><br/><br/><br/><br/><br/><br/><br/>
    <form method="POST" action="data.php">
        Titre : <br/>
        <input type="text" name="titre" required /><br/>
        Contenu :<br/>
        <textarea name="paragraphe" required></textarea><br/>
        <input type="submit" name="submit" value="Publier" />
    </form>

    <ol>
        <?php
         $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
         $req = $bdd->query("SELECT titre FROM blog ORDER BY date_publication DESC");
         while($row = $req->fetch())
         {
        ?>
            <li><a href="blog.php?id=<?php echo $row['id']; ?>"><?php echo $row['titre']; ?></a></li>
            <?php
         }
    ?>
    </ol>

<?php require 'footer.php'; ?>