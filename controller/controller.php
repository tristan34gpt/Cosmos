<?php
require('model/model-users.php');
require('model/model-registration.php');
require('utils/viewUtils.php');

function home(){

$requete = getUsers();

require('view/home-view.php');

}

function conection(){
    require('view/conection-view.php');
}

function registration() {

    // LOGIQUE METIER
    // vérification que tout les inputs sont remplis
    if(!empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['email']) 
    && !empty($_POST['password']) && !empty($_POST['passwordTwoo'])){
        
        $lastName      = htmlspecialchars($_POST['name']);
        $firstName     = htmlspecialchars($_POST['prenom']);
        $email         = htmlspecialchars($_POST['email']);
        $password      = htmlspecialchars($_POST['password']);
        $passwordTwoo  = htmlspecialchars($_POST['passwordTwoo']);
        $erreur = '';
        // vérification de la syntaxe de l'email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            // vérification si l'utilisateur existe déjà
            if (isUserExist($email)) {
                // vérification mots de passes identiques
                if($password == $passwordTwoo) {
                    // APPEL A NOS OUTILS
                    // Appel de la fonction pour enregistrer un utilisateur dans la base de données                    
                    registerUser( $firstName,$lastName,$email,$password)

                    // création des sessions
                    $_SESSION['nom'] = $lastName;
                    $_SESSION['prenom'] = $firstName;
                    $_SESSION['connection'] = true;

                    // redirection page d'acceuil 
                    header('location: index.php?page=accueil');
                    exit();
                } else {
                    $erreur = "Vos mots de passe ne correspondent pas";
                }
            } else {
                $erreur = "Votre adresse email est déjà utilisée";
            }
        } else {
            $erreur = "Votre adresse email n'est pas valide";
        }
        //---------------------------------------------

        // RENDU DE LA VUE
        renderView("Inscription", "registration-view",[ 'erreur' => $erreur ]);
    }
 
    renderView("Inscription", "registration-view");
}
