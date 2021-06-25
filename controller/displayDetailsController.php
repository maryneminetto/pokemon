<?php


include '../model/PokemonRepo.php';
include '../controller/session.php';



function getOnePokemon($url)
{
    $pokemon = new PokemonRepo();
    $pokemon->getAPokemon($url);
    $pokemons = $pokemon->getArray();
    return $pokemons;


}

