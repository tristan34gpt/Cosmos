<?php
$title = "connexion";
ob_start();
?>

<!-- mon formulaire de connexion !-->

<div class="container bg-dark text-white mt-4 p-3 text-center">
    <form method="post" action="model/model-conection">

        <label class="d-block" for="email">Votre adresse email</label>
        <input type="email" name="email" placeholder="entrez votre adresse email">

        <label class="d-block" for="password">Votre mot de passe</label>
        <input type="password" placeholder="entrez votre mot de passe">

        <p>vous n'êtes pas inscrit ? 
            <a href="registration-view.php">inscrivez-vous !</a>
        </p>

    </form>
</div>

<?php
$content = ob_get_clean();
require('base.php');
?>