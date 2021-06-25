<?php

include '../controller/displayPokemonController.php';
include '../controller/session.php';

if(isset($_SESSION['nextPage'])) {
$i = $_SESSION['nextPage'];
$_SESSION['prevPage']=$i;

}else {
    $i = 0;
}

if(isset($_SESSION['prevPage'])){
    $i = $_SESSION['prevPage'];
    $_SESSION['nextPage']=$i;
}



if(isset($_SESSION['returnPage'])) {
    $i = $_SESSION['returnPage'];
}

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

        <?php include 'displayPokemon.php'; ?>

    </div>
    <div class="container flex my-10 justify-center items-center">
        <a href="../controller/displayPokemonController.php?prevPage=$i" class="btn-blue mr-4">Back</a>
        <a href="../controller/displayPokemonController.php?nextPage=$" class="btn-blue mr-4">Next</a>

    </div>
</main>

<footer>
    <?php include 'footer.php'; ?>
</footer>

</body>
</html>


