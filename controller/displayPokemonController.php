<?php

include_once '../model/PokemonRepo.php';

include_once 'session.php';

$pokemon = new PokemonRepo();

if(sizeof($_SESSION) == 0) {
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;
    $pokemon->createPokemon();
}

?>







