<?php
$erreur = null;
var_dump($_POST);
if(isset($_POST['forgot-password'])) {
    if(isset($_POST['mail'])&& !empty($_POST['mail'])) {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $mail = htmlspecialchars($_POST['mail']);
    $mail = filter_var($mail, FILTER_VALIDATE_EMAIL);
    $req = $bdd->prepare("SELECT * FROM membre WHERE mail");
    $req->execute(array(
        'mail' => $mail));
    $resultat = $req->fetch(PDO::FETCH_ASSOC);
    header('Location: askquestion.php');     
        }else {
            $erreur = "Compte inexistant, veuillez recommencer !";
        }
    }else {
        $erreur = "Veuillez saisir votre adresse mail";
    }