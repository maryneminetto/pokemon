<?php

include_once '../model/PokemonRepo.php';

include_once 'session.php';

$pokemon = new PokemonRepo();

if(sizeof($_SESSION) == 0) {
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;
}

?>







