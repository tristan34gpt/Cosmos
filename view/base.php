<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="public/design/css/style.css">
    <title><?= $title?></title>
</head>
<body>
    
<!-- navigation !-->

<nav class="navbar navbar-expand navbar-dark bg-dark">
    <ul class=" p-2 navbar-nav">
        <li class="navbar-brand">Cosmos</li>
        <li class="nav-item">
            <a class="nav-link" href="home-view.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">profil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="conection-view.php">Connexion</a>
        </li>
    </ul>
</nav>


<?= $content ?>

</body>
</html>