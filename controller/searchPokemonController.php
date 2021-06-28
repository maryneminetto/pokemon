<?php

include_once '../model/PokemonRepo.php';
include_once 'session.php';

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







