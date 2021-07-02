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
    <title>Pokemon | Accueil</title>
</head>
<body>
<header><?php include 'header.php'; ?></header>
<article>
    <h2 class=" text-xl text-center text-blue-900 font-semibold mb-2 mt-4">Equipe de <?php echo $_SESSION['user']->getFirstName() . ' ' . $_SESSION['user']->getLastName() ?></h2>

    <?php if (isset($_SESSION['user'])) {

        ?><h1 class=" text-2xl text-center text-gray-500 font-semibold mb-2 mt-4"> Bienvenue dans l'équipe nommée <?php echo $row[0]->teamName ?></h1>

        <?php
    }

    ?>
    <h2 class="justify-center flex flex-wrap text-xl text-center font-semibold mb-2 mt-4">
        <?php
        foreach ($row as $info) {
            ?>
            <div class='flex flex-col justify-center items-center border-8 border-blue-900 p-4 m-4 rounded-lg'>
                <img src="<?php echo $info->pathLogo ?>" class="w-72 max-h-72">
                <div class="content flex flex-col justify-center items-center text-gray-900 my-auto p-4">
                    <div class="title flex justify-center items-center mb-5">
                        <p class="text-xl text-center font-semibold uppercase border border-gray-900 py-2 px-4 rounded-full">
                            # <?php echo $info->pokedexNumber ?> </p>
                        <h2 class=" text-xl text-center font-semibold uppercase ml-5"><?php echo $info->name ?></h2>
                    </div>
                </div>


                <a href="displayDetail.php?url=https://pokeapi.co/api/v2/pokemon/<?php echo $info->id_pokemon ?>/"
                   class="btn-blue px-4 py-2 mt-6 w-40 font-semibold text-center">Voir la fiche</a>
                <a href="../controller/pokemonTeamController.php?delete=<?php echo $info->id_pokemon ?>"
                   class="btn-blue px-4 py-2 mt-6 w-40 font-semibold text-center">Supprimer de l'équipe</a>
            </div>
            <?php
        }

        ?>
</article>
<footer><?php include 'footer.php'; ?></footer>
</body>
</html>
