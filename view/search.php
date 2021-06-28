<?php

include '../controller/searchPokemonController.php';

?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../style.css">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
        <title>Pokemon | Search</title>
    </head>
    <body>

    <header><?php include 'header.php'; ?></header>


    <h2 class="text-blue-900 font-semibold my-6 text-3xl text-center" >Search your pokemon</h2>
    <div class="search flex justify-evenly items-center">

        <div class="searchName flex flex-col justify-center items-center">
            <h3 class="mb-2">Search by name</h3>
            <form action="search.php" method="post" class="mb-4 flex flex-col">
                <input type="text" name="name" placeholder="Search your Pokemon" class="border-b border-blue-900 p-2 w-52">
                <input type="submit" class="btn-sub">
            </form>
        </div>

        <div class="trait w-px border border-blue-900 h-52 bg-blue-900"></div>

        <div class="searchType flex flex-col justify-center items-center">
            <h3 class="mb-2">Search by type</h3>
            <form action="search.php" method="post" class="mb-4 flex flex-col">
                <select name="type" class="p-2 appearance-none border-b border-blue-900 w-52">
                    <option value="">Types</option>
                    <option value="bug">bug</option>
                    <option value="dark">dark</option>
                    <option value="dragon">dragon</option>
                    <option value="electric">electric</option>
                    <option value="fairy">fairy</option>
                    <option value="fighting">fighting</option>
                    <option value="fire">fire</option>
                    <option value="flying">flying</option>
                    <option value="ghost">ghost</option>
                    <option value="grass">grass</option>
                    <option value="ground">ground</option>
                    <option value="ice">ice</option>
                    <option value="normal">normal</option>
                    <option value="physic">physic</option>
                    <option value="poison">poison</option>
                    <option value="rock">rock</option>
                    <option value="steel">steel</option>
                    <option value="water">water</option>
                </select>
                <input type="submit" class="btn-sub">
            </form>
        </div>
    </div>
    <article>
        <?php
        if(isset($_POST['name'])){
        $pokemon = search($_POST['name']);
        ?>

        <div class='flex justify-evenly items-center border-8 border-blue-900 p-4 m-4 rounded-lg'>
            <!-- DIV DE GAUCHE -->
            <div class="content flex-1 flex-col justify-center items-center text-gray-900 my-auto py-4 pr-8 border-r border-blue-900 mr-10 ">
                <div class="title flex justify-center items-center mb-5">
                    <p class="text-xl text-center font-semibold uppercase border border-gray-900 py-2 px-4 rounded-full"> # <?php echo $pokemon->getNumber() ?> </p>
                    <h2 class=" text-xl text-center font-semibold uppercase ml-5"><?php echo $pokemon->getName() ?></h2>
                </div>
                <div class="img flex justify-center">
                    <img src="<?php echo $pokemon->getImg2() ?>">
                </div>
                <h3 class=" text-xl text-center font-semibold mb-5" >Type(s)</h3>
                <div class="type flex justify-center items-center">

                    <?php

                    foreach ($pokemon->getType() as $type){
                        ?>
                        <img src="../img/<?php echo $type->getName() ?>.png" alt="" width="100px" class="mx-4">
                        <?php
                    }
                    ?>
                </div>
            </div>
            <!-- DIV DE DROITE -->
            <div class="infos flex-1 flex-col justify-center items-center ml-10">
                <div class="stats flex flex-col justify-center items-center my-4">
                    <h3 class=" text-xl text-center font-semibold uppercase mb-2 mt-4">Stats</h3>
                    <table>
                        <?php
                        foreach ($pokemon->getStats() as $nomStat => $value) {

                            ?>
                            <tr>
                                <th class="uppercase text-gray-500 py-2">
                                    <?php echo $value->getName();?>
                                </th>
                                <td class=" uppercase pl-6">
                                    <?php echo $value->getValue() ; ?>
                                </td>
                                <td class="w-8/12 ">
                                    <div class="relative pt-1 ">
                                        <div class="overflow-hidden ml-2 h-2 text-xs flex rounded bg-gray-300 ">
                                            <div style="width:<?php echo ($value->getValue()/250)*100 ?>%"
                                                 class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center <?php echo $value->getColor() ?>"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="stats flex flex-col justify-center items-center my-4">
                    <h3 class=" text-lg text-center font-semibold uppercase mb-2 mt-4">Abilities</h3>
                    <?php
                    foreach ($pokemon->getAbilities() as $nomAbility => $value) {
                        ?>
                        <p class="ml-4 bg-blue-900 text-white font-semibold uppercase  p-1.5 rounded-md"><?php echo $nomAbility; ?> <?php if($value->isHidden() == 1) echo "<span class='lowercase italic'>(hidden)</span>"; ?></p>
                        <p class="text-md text-center my-2 w-10/12"> <?php echo $value->getEffect(); ?> </p>
                        <?php

                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </article>


    <article>
        <div class="container flex flex-wrap mx-auto mt-6">
            <?php
            if(isset($_POST['type'])){
            $pokemons = searchType($_POST['type']);
    
            foreach ($pokemons as $pokemon){
            ?>

                <div class='flex flex-col justify-center items-center border-8 border-blue-900 p-4 m-4 rounded-lg'>
                    <img src="<?php echo $pokemon->getImg() ?>" class="w-72 max-h-72">
                    <div class="content flex flex-col justify-center items-center text-gray-900 my-auto p-4">
                        <div class="title flex justify-center items-center mb-5">
                            <p class="text-xl text-center font-semibold uppercase border border-gray-900 py-2 px-4 rounded-full"> # <?php echo $pokemon->getNumber() ?> </p>
                            <h2 class=" text-xl text-center font-semibold uppercase ml-5"><?php echo $pokemon->getName() ?></h2>
                        </div>
                        <div class="type flex justify-center items-center">
                            <?php

                            foreach ($pokemon->getType() as $type){
                                ?>
                                <img src="<?php echo $type->getImg() ?>" alt="" width="100px" class="mx-4">
                                <?php
                            }
                            ?>
                        </div>

                        <a href="displayDetail.php?url=https://pokeapi.co/api/v2/pokemon/<?php echo $pokemon->getId() ?>/" class="btn-blue px-4 py-2 mt-6 w-40 font-semibold text-center">Voir la fiche</a>
                    </div>
                </div>

            <?php
            }}
            ?>

        </div>
    </article>

    </body>

    <footer><?php include 'footer.php'; ?></footer>
    </html>

