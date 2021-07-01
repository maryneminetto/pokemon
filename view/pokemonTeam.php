<?php
include '../controller/pokemonTeamController.php';
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Pokemon | Team</title>
</head>
<body>

<header>
    <?php include 'header.php' ?>
</header>
<h2 class="text-center uppercase">My Pokemon Team</h2>
<div class="container flex mx-auto">

<?php

foreach ($row as $info){
    var_dump($info);
    ?>



</div>

<?php
}
?>

</div>
<footer>
    <?php include 'footer.php' ?>
</footer>
</body>
</html>
