<?php

$title = "connexion";
ob_start();
?>


<!-- mon formulaire d'inscription !-->

<div class="container bg-dark text-white mt-4 p-3 text-center">
    <form method="post" action="?page=inscription">

        <label class="d-block" for="prenom">Prénom</label>
        <input type="text" name="prenom" placeholder="entrez votre Prénom" required>

        <label class="d-block" for="name">Nom</label>
        <input type="text" name="name" placeholder="entrez votre nom" required>

        <label class="d-block" for="email">Votre adresse email</label>
        <input type="email" name="email" placeholder="entrez votre adresse email" required>

        <label class="d-block" for="password">Votre mot de passe</label>
        <input type="password" name="password" placeholder="entrez votre mot de passe" required>

        <label class="d-block" for="passwordTwoo">Votre mot de passe</label>
        <input type="password" name="passwordTwoo" placeholder="confirmer votre mot de passe" required>

        <input class="d-block " type="submit" value="Envoyer">

        <p>vous avez déja un compte ? 
            <a href="">connecter-vous !</a>
        </p>

    </form>

    <?php
            if(isset($_GET['error'])) {

            if(isset($_GET['message'])) {
            echo'<div class="error">'.htmlspecialchars($_GET['message']).'</div>';
            }
        }
    ?>

</div>



<?php
$content = ob_get_clean();
require('base.php');
?>