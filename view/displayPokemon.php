<?php

include_once '../controller/displayPokemonController.php';

$name = "";

foreach($pokemonsArray as $poke=>$info){

    if ($info->Type1 == "" || $name == $info->name){

        continue;

    }else {

    $name = $info->name;

    ?>
    <div class='flex flex-col justify-center items-center border-8 border-blue-900 p-4 m-4 rounded-lg'>
        <img src="<?php echo $info->pathLogo ?>" class="w-72 max-h-72">
        <div class="content flex flex-col justify-center items-center text-gray-900 my-auto p-4">
            <div class="title flex justify-center items-center mb-5">
                <p class="text-xl text-center font-semibold uppercase border border-gray-900 py-2 px-4 rounded-full"> # <?php echo $info->pokedexNumber ?> </p>
                <h2 class=" text-xl text-center font-semibold uppercase ml-5"><?php echo $info->name ?></h2>
            </div>
            <div class="type flex justify-center items-center">

                <img src="../img/<?php echo $info->Type2; ?>.png" alt="" width="100px">
                <img src="../img/<?php echo $info->Type1; ?>.png" alt="" width="100px">


            </div>

            <a href="displayDetail.php?url=https://pokeapi.co/api/v2/pokemon/<?php echo $info->id ?>/" class="btn-blue px-4 py-2 mt-6 w-40 font-semibold text-center">Voir la fiche</a>
        </div>
    </div>
    <?php
    }

}

?>
