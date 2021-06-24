<?php

include_once '../controller/session.php';
include_once '../controller/displayPokemonController.php';

foreach($_SESSION['pokedex'] as $poke=>$info){
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
            <a href="displayDetail.php?url=https://pokeapi.co/api/v2/pokemon/<?php echo $info->getId() ?>/" class="btn-blue px-4 py-2 mt-6 w-40 font-semibold text-center">Voir la fiche</a>
        </div>
    </div>
    <?php
}

?>