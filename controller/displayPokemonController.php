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
    $_SESSION['nextPage'] += 12;
    $pokemon->setUrl($_SESSION['nextPage']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;

}

if(isset($_GET['prevPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['prevPage'] -= 12;
    print_r($_SESSION['prevPage']);
    $pokemon->setUrl($_SESSION['prevPage']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;

}

if(isset($_GET['returnPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['returnPage'] = 0;
    $_SESSION['nextPage'] = 0;
    $_SESSION['prevPage'] = 0;
    $pokemon->setUrl($_SESSION['returnPage']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;

}

$pokemonsArray = $_SESSION['pokedex'];





