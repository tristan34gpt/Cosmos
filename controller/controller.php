<?php
require('model/model-users.php');
require('model/model-registration.php');

function home(){

$requete = getUsers();

require('view/home-view.php');

}

function conection(){
    require('view/conection-view.php');
}

function registration(){

    require('view/registration-view.php');
    registrationUsers();
    

}
