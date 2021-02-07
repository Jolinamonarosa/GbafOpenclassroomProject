<?php
$erreur= null;
var_dump($_POST);
if(isset($_POST['mail'])) {
    $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
    $mail = htmlspecialchars($_POST['mail']);
    $req = $bdd->prepare("SELECT * FROM membre WHERE mail='$mail'");
    $req->execute(array(
        'mail' => $mail));
    $resultat = $req->fetch(PDO::FETCH_ASSOC);
}
    if(isset($_POST['reset-password'])) {
        if(isset($_POST['question']) && (isset($_POST['reponse'])) && !empty($_POST['question']) && !empty($_GET['reponse'])) {
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        $question = htmlspecialchars($_POST['question']);
        $reponse = htmlspecialchars($_POST['reponse']);
        $req = $bdd->prepare("SELECT mail FROM membre WHERE question='$question' AND reponse='$reponse'");
        $req->execute(array(
            'question' => $question, 
            'reponse' => $reponse));
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        header('Location: reset_password.php');
            }else {
                $erreur = "Réponse incorrecte, veuillez retaper votre réponse, donnée lors de votre inscription"; 
            }
        }else {
            $erreur = "Veuillez entrer une réponse !";
        }