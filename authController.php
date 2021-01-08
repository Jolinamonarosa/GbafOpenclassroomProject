<?php 
require_once 'database.php';

if(isset($_POST['forgot-password'])) {
    $mail = $_POST['mail'];

    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Adresse email invalide";
    }
    if(empty($mail)) {
        $errors['mail'] ="Adresse email demandée";
    }
    if(count($errors) == 0) {
        $sql = "SELECT * FROM membres WHERE mail='$mail' LIMIT 1";
        $result = mysqli_query($bdd, $sql);
        $membre = mysqli_fetch_assoc($result);
        $token = $membre['token'];
        sendPasswordResetLink($mail, $token);
        header('Location: reset_password.php');
        exit(0);
    }
}

if(isset($_POST['reset-password-btn'])) {
    $password = $_POST['password'];
    $password = $_POST['passwordConf'];

    if (empty($password) || empty($passwordConf)) {
        $errors['password'] = "Mot de passe requis";
    }
    if ($password !== $passwordConf) {
        $errors['password'] = "Les deux mots de passe ne correspondent pas !";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $mail = $_SESSION['mail'];

    if (count($errors) == 0) {
        $sql = "UPDATE membres SET mdp='$password' WHERE mail='$mail'";
        $result = mysqli_query($bdd, $sql);
        if($result) {
            location('Location: connexion.php');
            exit(0);
        }
    }
}

function resetPassword($token) {
    global $bdd;
    $sql = "SELECT * FROM membres WHERE token='$token' LIMIT 1";
    $result = mysqli_query($bdd, $sql);
    $membre = mysqli_fetch_assoc($result);
    $_SESSION['mail'] = $membre['mail'];
    header('Location: reset_password.php');
    exit();
}