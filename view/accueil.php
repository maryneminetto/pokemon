<?php

include '../controller/displayPokemonController.php';

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Pokemon | Accueil</title>
</head>
<body>


<header>
    <?php include 'header.php'; ?>
</header>

<main>
    <div class="container flex flex-wrap mx-auto mt-6">

        <?php include 'displayPokemon.php'?>

    </div>
</main>

<footer>
    <?php include 'footer.php'; ?>
</footer>

</body>
</html>


