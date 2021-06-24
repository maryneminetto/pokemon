<?php

include '../controller/displayDetailsController.php';

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
    <title>Pokemon | Details</title>
</head>
<body>

<header>
    <?php include 'header.php'; ?>
</header>

<main>
    <?php

    if(isset($_GET['url'])){
        getOnePokemon($_GET['url']);
    }

    ?>
</main>

<footer>
    <?php include 'footer.php'; ?>
</footer>

</body>
</html>
