<?php


include_once '../model/PokemonRepo.php';
include_once 'session.php';


$pokemon = new PokemonRepo();
$pokemonsArray = [];


if (sizeof($_SESSION) == 0) {
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;
    $_SESSION['pokeList'] = [];

}


if (isset($_GET['nextPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] += 12;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if (isset($_GET['nextPagex2'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] += 24;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if (isset($_GET['prevPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] -= 12;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if (isset($_GET['prevPagex2'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] -= 24;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if (isset($_GET['returnPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] = 0;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if (isset($_SESSION['pokeList'])) {
    if (in_array($_SESSION['pokedex'], $_SESSION['pokeList']) == true) {

    } else {
        $_SESSION['pokeList'] = array_unique(array_merge($_SESSION['pokeList'], $_SESSION['pokedex']), SORT_REGULAR);
    }

} else {
    $_SESSION['pokeList'] = [];
}