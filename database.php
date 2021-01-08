<?php

function getPDO(){
try
{
        $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $bdd;
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
}
?>