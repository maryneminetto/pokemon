<?php

include_once '../model/PokemonRepo.php';

include_once 'session.php';

$pokemon = new PokemonRepo();
$pokemon->createPokemon();

if(sizeof($_SESSION) == 0) {
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;
}

?>







