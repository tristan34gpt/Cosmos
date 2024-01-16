<?php
$title = "Cosmos";
ob_start();
?>

<header>
    <video autoplay loop muted class="w-100 h-25" src="public/asset/vidéo/vidéo.mp4"></video>
</header>


<div class="container">
    <h2 class="mt-4 text-center">Les news sur l'espace !</h2>

    <div class="bg-dark">
        <p class="text-light text-center p-3">le cosmos</p>
    </div>
</div>

<?php
$content = ob_get_clean();
require('base.php');
?>