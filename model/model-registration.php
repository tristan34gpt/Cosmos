<?php
session_start();

function registrationUsers(){
    // vérification que tout les inputs sont remplis
    if(!empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['email']) 
    && !empty($_POST['password']) && !empty($_POST['passwordTwoo'])){
        
        $lastName      = htmlspecialchars($_POST['name']);
        $firstName     = htmlspecialchars($_POST['prenom']);
        $email         = htmlspecialchars($_POST['email']);
        $password      = htmlspecialchars($_POST['password']);
        $passwordTwoo  = htmlspecialchars($_POST['passwordTwoo']);

        // vérification de la syntaxe de l'email
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            // vérification mots de passes identiques
            if($password == $passwordTwoo){
                require('model-database.php');
                // création de la requête pour vérifier qu'il n'y a pas de doublons de mail
                $requete = $bdd -> prepare('SELECT COUNT(*) AS number FROM user WHERE email = ?' );
                $requete -> execute([$email]);

                while($verifMail = $requete -> fetch()){ 
                    if($verifMail['number'] !== 0){
                    // redirection mail en doublons 
                        header('location: view/registration-view.php?error=1&message=Votre adresse email est déja utilisé.');
                        exit();
                    }else{
                        //cryptage du mot de passe
                        $password = "ab1".sha1($password."823")."12";
                        
                        // création des sessions
                        $_SESSION['nom'] = $lastName;
                        $_SESSION['prenom'] = $firstName;
                        $_SESSION['connection'] = true;

                        // insertion de l'utilisateur dans la base de donées

                        $requete = $bdd -> prepare('INSERT INTO user(first_name,last_name,email,password) VALUES(?,?,?,?)');
                        $requete -> execute([ $firstName,$lastName,$email,$password]);

                        // redirection page d'acceuil 
                        header('location: ../?page=accueil');
                        exit();
                    }
                }
            }else{
                // redirection mot de passe pas identiques
                header('location: view/registration-view.php?error=1&message=Vos mots de passes ne sont pas indentiques.');
                exit();
            }
        }else{
            // redirection syntaxe email mauvaise
            header('location: view/registration-view.php?error=1&message=Votre adresse email est incorrecte.');
                exit();
        }  

    }

}