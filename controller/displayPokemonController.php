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



if(isset($_GET['nextPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['nextPage'] = $_GET['nextPage'] + 12;
    $pokemon->setUrl($_SESSION['nextPage']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;

}

if(isset($_GET['prevPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['prevPage'] = $_GET['prevPage'] - 12;
    $pokemon->setUrl($_SESSION['prevPage']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;

}

$pokemonsArray = $_SESSION['pokedex'];





