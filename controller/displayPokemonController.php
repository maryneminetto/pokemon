<?php


include_once '../model/PokemonRepo.php';
include_once 'session.php';


$pokemon = new PokemonRepo();

$pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root', '');
$queryPokemon = $pdo->prepare('
SELECT pokemonlist.name , pokemonlist.id, pokemonlist.pokedexNumber, pokemonlist.pathLogo, type1.ImgPath, type1.name AS Type1, IF(type1.name != type2.name, type2.name, \'\') AS Type2, type2.ImgPath FROM `pokemonlist` 
JOIN hastype AS hasType1 ON pokemonlist.id = hastype1.id_pokemon
JOIN type as type1 ON hastype1.id_type = type1.id
JOIN hastype as hastype2 ON pokemonlist.id = hastype2.id_pokemon
JOIN type AS type2 on hastype2.id_type = type2.id
GROUP BY pokemonlist.name , pokemonlist.id, type1.name
ORDER BY pokemonlist.id
LIMIT 30');
$queryPokemon->execute();
$rowPokemon = $queryPokemon->fetchAll(PDO::FETCH_OBJ);
$pokemonsArray = $rowPokemon;




if(sizeof($_SESSION) == 0) {
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;
    $_SESSION['pokeList'] = [];

}



if(isset($_GET['nextPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] += 12;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if(isset($_GET['nextPagex2'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] += 24;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if(isset($_GET['prevPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] -= 12;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if(isset($_GET['prevPagex2'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] -= 24;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

if(isset($_GET['returnPage'])) {
    header('location: ../view/accueil.php');
    $_SESSION['offset'] = 0;
    $pokemon->setUrl($_SESSION['offset']);
    $pokemon->createPokemon();
    $pokemons = $pokemon->getArray();
    $_SESSION['pokedex'] = $pokemons;


}

/*if(isset($_SESSION['pokeList'])){
    if (in_array($_SESSION['pokedex'],$_SESSION['pokeList'])==true){

    }else {
        $_SESSION['pokeList'] = array_unique(array_merge($_SESSION['pokeList'], $_SESSION['pokedex']), SORT_REGULAR);
    }

}else {
    $_SESSION['pokeList'] = [];
}*/









