<?php

include_once '../model/PokemonRepo.php';
include 'session.php';
//$_SESSION = [];
//session_destroy();

$pokemon = new PokemonRepo();
$pokemonsArray = [];

if(sizeof($_SESSION) == 0) {
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;
}

$pokemonsArray = $_SESSION['pokedex'];






