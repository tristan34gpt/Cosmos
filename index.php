<?php

require('controller/controller.php');

if(isset($_GET['page'])){
    if($_GET["page"] == 'accueil'){
        home();
    }else if ($_GET["page"] == 'connexion'){
        conection();
    }else if ($_GET["page"] == 'inscription'){
        registration();
}
}else{
    home();
    }
