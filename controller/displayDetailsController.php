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
            <div class='flex justify-evenly items-center border-8 border-blue-900 p-4 m-4 rounded-lg'>
                <!-- DIV DE GAUCHE -->
                <div class="content flex-1 flex-col justify-center items-center text-gray-900 my-auto py-4 pr-8 border-r border-blue-900 mr-10 ">
                    <div class="title flex justify-center items-center mb-5">
                        <p class="text-xl text-center font-semibold uppercase border border-gray-900 py-2 px-4 rounded-full"> # <?php echo $info->getNumber() ?> </p>
                        <h2 class=" text-xl text-center font-semibold uppercase ml-5"><?php echo $info->getName() ?></h2>
                    </div>
                    <div class="img flex justify-center">
                        <img src="<?php echo $info->getImg2() ?>">
                    </div>
                    <h3 class=" text-xl text-center font-semibold mb-5" >Type(s)</h3>
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
                <div class="infos flex-1 flex-col justify-center items-center ml-10">
                    <div class="stats flex flex-col justify-center items-center my-4">
                        <h3 class=" text-lg text-center font-semibold uppercase mb-2 mt-4">Stats</h3>
                        <table>
                        <?php
                        foreach ($info->getStats() as $nomStat => $value) {
                            ?>
                            <tr>
                                <th>
                                    <?php echo $nomStat;?>
                                </th>
                                <td>
                                    <?php echo $value; ?>
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
                        foreach ($info->getAbilities() as $nomAbility => $value) {
                            ?>
                            <p class="text-md text-center font-semibold uppercase my-2 w-10/12"> <span class="ml-4 bg-blue-900 text-white p-1.5 rounded-md"><?php echo $nomAbility." : "; ?> </span>  <span class="font-normal lowercase ml-4"> <?php echo $value->getEffect(); ?> </span> </p>
                            <?php

                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php

    }

}

