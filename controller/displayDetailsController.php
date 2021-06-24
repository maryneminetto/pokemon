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
            <div class='flex flex-col justify-center items-center border-8 border-blue-900 p-4 m-4 rounded-lg'>
            <img src="<?php echo $info->getImg() ?>" class="w-72 max-h-72">
            <div class="content flex flex-col justify-center items-center text-gray-900 my-auto p-4">
                <div class="title flex justify-center items-center mb-5">
                    <p class="text-xl text-center font-semibold uppercase border border-gray-900 py-2 px-4 rounded-full"> # <?php echo $info->getNumber() ?> </p>
                    <h2 class=" text-xl text-center font-semibold uppercase ml-5"><?php echo $info->getName() ?></h2>
                </div>
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
                <img src="<?php echo $info->getImg2() ?>" class="w-100 max-h-100">
            </div>
        <?php

    }

}

