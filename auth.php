<?php
function est_connecte() : bool {
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['connecte']);
}

function forcer_utilisateur_connecte (): void {
    if(!est_connecte()) {
        header('Location: connexion.php');
        exit();
}
}

function bonjour_user() {
    if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
        echo 'Bonjour' . $_SESSION['pseudo'];
    }
}