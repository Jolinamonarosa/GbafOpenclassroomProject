<?php
include_once 'database.php';
include_once 'inscription.php';

if(isset($_POST['forminscription'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $mdp2 = htmlspecialchars($_POST['mdp2']);
    date_default_timezone_set ('Europe/Paris');
    $date = date('d/m/Y à H:i:s');
    $question = ($_POST['question']);
    $reponse = htmlspecialchars($_POST['reponse']);
}

if((!empty($pseudo))&&(!empty($nom))&&(!empty($prenom))&&(!empty($mail))&&(!empty($mdp))&&(!empty($mdp2))&&(!empty($question))&&(!empty($reponse))){
        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                if($mail == 0){
                    $pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                    if($mdp == $mdp2){
                        $bdd = getPDO();
                        $rowEmail = count($bdd, 'mail', $mail);
                        if($rowEmail == 0){
                            $insertmbr = $bdd->prepare('INSERT INTO membres(pseudo, nom, prenom, mail, mdp, date_inscription, question, reponse) VALUES(:pseudo, :nom, :prenom, :mail, :mdp, CURDATE(), :question, :reponse)');
                            $insertmbr->execute(array(
                                'pseudo'=>$pseudo,
                                'nom'=>$nom,
                                'prenom'=>$prenom,
                                'mail'=>$mail,
                                'mdp'=>$pass_hache,
                                'question' =>$question,
                                'reponse' =>$reponse));
                                
                            header('Location: connexion.php');
                        }else{
                            $errorMessage="L'email est déjà dans la base de données !";
                        }
                    }else{
                        $errorMessage="Vos mots de passes ne correspondent pas !";
                    }
                }else{
                    $errorMessage="Votre adresse mail est déjà utilisée !";
                }
        }else{
            $errorMessage="Le mail n'est pas un mail valide !";
        }
}else{
    $errorMessage="Veuillez remplir tous les champs !";
}