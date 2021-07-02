<?php

include_once '../controller/selectTeamController.php';

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
    <title>Pokemon | Connection</title>
</head>
<body class="bg-black bg-opacity-50">

<div class="flex flex-col justify-center items-center mt-72 ">
    <div class="flex flex-col justify-center items-center border border-blue-900 py-20 px-52 rounded-md bg-white">
        <h2 class=" text-xl text-center font-semibold uppercase mb-2 mt-4">Your teams</h2>
        <form action="../controller/pokemonTeamController.php" method="post" class="flex flex-col justify-center items-center mt-4">
            <select name="selectTeam">
                <?php
                var_dump($_GET['pokedexNumber']);
                foreach ($row2 as $team){

                ?>
                <option value="<?php echo $team->teamName; ?>"><?php echo $team->teamName; ?></option>
                <?php
                }
                ?>
            </select>
            <input type="hidden" name="pokeNumber" value="<?php echo $_GET['pokedexNumber']; ?>">
            <input type="submit" name="submitTeam" class="btn-sub my-2">
        </form>
        <h2 class=" text-xl text-center font-semibold uppercase mb-2 mt-4">Create a team</h2>
        <form action="../controller/pokemonTeamController.php" method="post" class="flex flex-col justify-center items-center mt-4">
            <input type="text" name="teamName" class="border-b border-blue-900">
            <input type="hidden" name="pokeNumber" value="<?php echo $_GET['pokedexNumber']; ?>">
            <input type="submit" name="submitTeamName" class="btn-sub my-2">
        </form>
    </div>
</div>

</body>
</html>