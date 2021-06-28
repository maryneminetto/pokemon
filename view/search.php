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

    <h2>Search your pokemon</h2>


    <form action="search.php" method="post">
        <input type="text" name="name" placeholder="Search your Pokemon">
        <input type="submit">
    </form>

    <article>
        <?php
        if(isset($_POST['name'])){
            $pokemon = search($_POST['name']);
        }
        print_r($pokemon);?>
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
        </div>
    </article>

    </body>

    <footer><?php include 'footer.php'; ?></footer>
    </html>


<?php


?>