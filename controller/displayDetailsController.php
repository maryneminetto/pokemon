<?php


include '../model/PokemonRepo.php';
include '../controller/session.php';



function getOnePokemon($url)
{
    $pokemon = new PokemonRepo();
    $pokemon->getAPokemon($url);
    $pokemons = $pokemon->getArray();
    foreach ($pokemons as $info) {
        ?>
            <div class='flex justify-center flex-wrap items-center border-8 border-blue-900 p-4 m-4 rounded-lg'>
                <!-- DIV DE GAUCHE -->
                <div class="content flex flex-col justify-center items-center text-gray-900 my-auto py-4 pr-8 border-r border-blue-900 mr-10">
                    <div class="title flex justify-center items-center mb-5">
                        <p class="text-xl text-center font-semibold uppercase border border-gray-900 py-2 px-4 rounded-full"> # <?php echo $info->getNumber() ?> </p>
                        <h2 class=" text-xl text-center font-semibold uppercase ml-5"><?php echo $info->getName() ?></h2>
                    </div>
                    <img src="<?php echo $info->getImg2() ?>" class="w-100 max-h-100">
                    <div class="type flex justify-center items-center">
                        <?php

                        foreach ($info->getType() as $type){
                            ?>
                            <img src="../img/<?php echo $type->getName() ?>.png" alt="" width="100px" class="mx-4">
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- DIV DE DROITE -->
                <div class="infos flex flex-col justify-center items-center ml-10">
                    <div class="stats flex flex-col justify-center items-center">
                        <h3 class=" text-lg text-center font-semibold uppercase ml-5"> Stats </h3>
                        <?php
                        foreach ($info->getStats() as $NomStat => $value) {
                            ?>
                            <p class=" text-md text-center font-semibold uppercase ml-5"> <?php echo $NomStat." : ".$value; ?></p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php

    }

}

