<?php
function sendPasswordResetLink($userEmail, $token) {
    global $mailer;

    $body = '<DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Vérification email</title>
    </head>
    <body>
        <div class="wrapper">
        <p>Bonjoir!
        Veuillez cliquer sur le lien suivant pour réinitialiser votre mot de passe.
        </p>
        <a href="http://localhost/gbaf/index.php?password-token=' . $token . '">
        Réinitialiser le mot de passe 
        </a>
        </div>
    </body>
    </html>';

    $message = (new Swift_Message('Reinitialiser le mot de passe'))
    ->setFrom(EMAIL)
    ->setTo($userEmail)
    ->setBody($body, 'text/html');

    $result = $mailer->send($message);
}
