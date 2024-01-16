<?php
function getUsers(){
    try{
    $bdd = new PDO('mysql:host=localhost;dbname=mon blog;charset=utf8', "root", "");
    $requete = $bdd->query('SELECT * FROM user');    
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    } 
    return $requete;
}
