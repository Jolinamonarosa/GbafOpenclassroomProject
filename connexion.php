  <body>
      <?php include 'header.php' ?>
    <main>
        <div id="container">
            <form action="verif_connexion.php" method="POST">
                
                <label><b>Nom d'utilisateur :</b></label>
                <input type="text" placeholder="Entrer votre nom d'utilisateur" name="username" required>

                <label><b>Mot de passe :</b></label>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" required>
                <a href="forgot_password.php">Mot de passe oublié?</a>
                <input type="submit" id='submit' value='CONNEXION' >
            <a href="inscription.php">Pas encore inscrit? Inscrivez-vous</a>
            </form>

            <?php
            if(isset($_GET['newpwd'])) {
              if($_GET['newpwd'] == "passwordupdated") {
                echo '<p class="signupsuccess">Votre mot de passe a été réinitialisé !</p>';
              }
            }
            ?>

        </div>
    </main>
    <?php include 'footer.php' ?>