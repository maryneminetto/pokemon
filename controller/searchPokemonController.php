<?php

include_once '../model/PokemonRepo.php';
include_once 'session.php';


/*function getPokemonName($str)
{
    $pokemons = new PokemonRepo();
    $pokeList = $pokemons->getPokemonWithName($str);
    foreach ($pokeList as $poke) {
        if ($poke['name'] == $str) {
            $pokemons->getAPokemon($poke['url']);
            $pokemon = $pokemons->getArray();
            return $pokemon;
        }
    }

}*/

function search($str)
{
    $name = $str;
    foreach ($_SESSION['pokeList'] as $poke) {
        if ($poke->getName() == $name) {
            return $poke;
        }
    }
}

function searchType($str)
{
    $arrPokemon = [];

    foreach ($_SESSION['pokeList'] as $poke) {
        foreach ($poke->getType() as $type){
            if ($type->getName() == $str) {
                $arrPokemon[] = $poke;

            }

        }

    }
    return $arrPokemon;
}







