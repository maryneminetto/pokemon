<?php

include '../controller/displayPokemonController.php';
include '../controller/session.php';

if (!isset($_SESSION['offset'])) {
    $_SESSION['offset'] = 0;
    echo $_SESSION['offset'];
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
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
        <?php if ($_SESSION['offset']>=24){
            ?>
            <a href="../controller/displayPokemonController.php?prevPagex2=<?php echo $_SESSION['offset']?>" class="btn-blue mr-4"><span class="material-icons">
            arrow_back_ios
</span><span class="material-icons">
            arrow_back_ios
</span></a>
         <?php
        } ?>
        <?php
        if($_SESSION['offset']!=0){
            ?>
        <a href="../controller/displayPokemonController.php?prevPage=<?php echo $_SESSION['offset']?>" class="btn-blue mr-4"><span class="material-icons">
arrow_back_ios
</span></a>
        <?php
        }
        ?>

        <a href="../controller/displayPokemonController.php?nextPage=<?php echo $_SESSION['offset']?>" class="btn-blue mr-4"><span class="material-icons">
arrow_forward_ios
</span></a>
        <a href="../controller/displayPokemonController.php?nextPagex2=<?php echo $_SESSION['offset']?>" class="btn-blue mr-4"><span class="material-icons">
arrow_forward_ios
</span><span class="material-icons">
arrow_forward_ios
</span></a>

    </div>
</main>

<footer>
    <?php include 'footer.php'; ?>
</footer>

</body>
</html>


