<?php 
require_once 'database.php';
require_once 'header_user.php';

if(isset($_POST['logo'], $_POST['titre'], $_POST['texte_mini'], $_POST['texte']) && !empty($_POST['logo']) && !empty($_POST['titre']) && !empty($_POST['texte_mini']) && !empty($_POST['texte'])) {
    $logo = ($_POST['logo']);
    $titre = htmlspecialchars($_POST['titre']);
    $minitexte = htmlspecialchars($_POST['texte-mini']);
    $texte = htmlspecialchars($_POST['texte']);
    $datenow = date("Y-m-d H:i:s");

    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $req = $bdd->prepare("INSERT INTO partenaire (logo, titre, texte_mini, texte, date_publication) VALUES (:logo, :titre, :paragraphe, texte_mini, :texte, :date_publication)");
    $req->execute(array(
        'logo'=>$logo,
        'titre'=>$titre,
        'texte_mini'=>$minitexte,
        'texte'=>$texte,
        'date_publication'=>$datenow));

    Header('Location: accueil.php');
}
?>
<br/><br/><br/><br/><br/><br/><br/><br/>
    <form method="POST" action="">
        Titre : <br/>
        <input type="text" name="titre" required /><br/>
        Contenu :<br/>
        <textarea name="texte_mini" required></textarea><br/>
        <input type="submit" name="submit" value="Publier" />
    </form>

    <ol>
        <?php
         $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
         $req = $bdd->query("SELECT titre FROM partenaire ORDER BY date_publication DESC");
         while($row = $req->fetch())
         {
        ?>
            <li><a href="partenaire.php?id=<?php echo $row['id']; ?>"><?php echo $row['titre']; ?></a></li>
            <?php
         }
    ?>
    </ol>

<?php require 'footer.php'; ?>