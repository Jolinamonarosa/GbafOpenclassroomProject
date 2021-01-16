<?php
require_once 'database.php';
?>
   <?php require 'header.php' ?>
   <body>
      <form action="" method="POST">
         <div id="container_contact">
            <h2>Nous contacter :</h2>
               <label><b>Nom :</b><span class="required">*</span></label>
                  <input type="text" name="name" class="long" required/>
                  <span class="error" id="errorname"></span>
                  <label><b>Email :</b><span class="required">*</span></label></br>
                  <input type="email" name="email" class="long" required/>
                  <span class="error" id="erroremail"></span>
                  </br>
                  <label><b>Message :</b><span class="required">*</span></label></br>
                  <textarea name="message"></textarea>
                  </br>
                  <input type="submit" value="Envoyer">      
                  <input type="reset" value="Réinitialiser">
         </div>
      </form>
      <?php include 'footer.php' ?>
