<?php
require('model/model-database.php');

function isUserExist($email){
    $req = $bdd->prepare('SELECT COUNT(*) AS numberEmail FROM user WHERE email = ?');
    $req->execute(array($email));
    while($emailVerification = $req->fetch()){
        if($emailVerification['numberEmail'] != 0){
            return true;
        }else{
            return false;
        }
    }
}

function registerUser( $firstName,$lastName,$email,$password){
    //cryptage du mot de passe
    $password = "ab1".sha1($password."823")."12";
    // insertion de l'utilisateur dans la base de donées
    $requete = $bdd -> prepare('INSERT INTO user(first_name,last_name,email,password) VALUES(?,?,?,?)');
    $requete -> execute([ $firstName,$lastName,$email,$password]);
}
