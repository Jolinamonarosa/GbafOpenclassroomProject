<?php
session_start();
include_once 'database.php';

if(isset($_POST['pseudo']) && isset($_POST['mdp']))
{
    $pseudo = mysqli_real_escape_string($bdd,htmlspecialchars($_POST['pseudo'])); 
    $password = mysqli_real_escape_string($bdd,htmlspecialchars($_POST['mdp']));
    
    if($pseudo !== "" && $password !== ""){
        $requete = "SELECT count(*) FROM membres WHERE pseudo = '".$pseudo."' AND mdp = '".$password."' ";
        $exec_requete = mysqli_query($bdd,$requete);
        $reponse = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0){
           $_SESSION['pseudo'] = $pseudo;
           header('Location: accueil.php');
        }
        else{
           header('Location: connexion.php?erreur=1');
        }
    }
    else{
       header('Location: connexion.php?erreur=2');
    }
}
else{
   header('Location: accueil.php');
}
mysqli_close($bdd);
?>