
<?php
if (isset($_POST['id_pseudo']) and isset($_POST['message']) //Si les messages existent
    if($_POST['id_pseudo'] != NULL and $_POST['message'] != NULL)
    //On se connecte à MySQL
    mysql_connect("nom_du_serveur", "nom_de_l'utilisateur", "mot_de_passe");
    mysql_select_db("nom_de_votre_base_de_donnee");
    // On utilise la fonction PHP htmlentities pour éviter d'enregistrer du code HTML dans la table
    $pseudo = htmlspecialchars ($_POST['id_pseudo']);
    $message = htmlspecialchars ($_POST['message']);
    //On enregistre dans la table minichat
    mysql_query("INSERT INTO minichat VALUES('', '$pseudo', '$message')");
    //On se déconnecte de MySQL
    mysql_close();
    }
}
?>

<form action="minichat.php?message=envoyer" method="post">
Votre pseudo : <input type="text" name="pseudo" /><br />
Votre message : <input type="text" name="message" /><br />
<input type="submit" value="Envoyer" />
</form>

<?php
// Maintenant on doit récupérer les 10 dernières entrées de la table
// On se connecte d'abord à MySQL :
mysql_connect("nom_du_serveur", "nom_de_l'utilisateur", "mot_de_passe");
mysql_select_db("nom_de_votre_bdd");
// On utilise la requête suivante pour récupérer les 10 derniers messages :
$reponse = mysql_query("SELECT * FROM minichat ORDER BY ID DESC LIMIT 0,10");
// On se déconnecte de MySQL
mysql_close();

while($donnees = mysql_fetch_array($reponse))
{
?>
<p><strong><?php echo$donnees['pseudo']; ?></strong> : <?php echo $donnees['message']; ?></p>

<?php
?>