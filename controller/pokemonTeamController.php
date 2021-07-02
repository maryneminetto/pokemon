<?php

include_once '../model/User.php';
include_once '../controller/session.php';

$pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root', '');

if(isset($_GET['pokedexNumber'])) {
    $number = $_GET['pokedexNumber'];
    $query = $pdo->prepare('SELECT * FROM PokemonTeam WHERE id_Pokemon = :pokeNum');
    $query->execute(array(':pokeNum' => $number));
    $row = $query->fetch(PDO::FETCH_OBJ);

    if($row == ''){
        $query = $pdo->prepare('SELECT * FROM PokemonList WHERE pokedexNumber = :pokeNum');
        $query->execute(array(':pokeNum' => $number));
        $row = $query->fetch(PDO::FETCH_OBJ);
        $queryInsert = $pdo->prepare('INSERT INTO PokemonTeam(teamName, id_Dresseur, id_pokemon) VALUE (:name, :idDresseur, :idPokemon)');
        $queryInsert->execute(array(':name'=>$_GET['teamName'], ':idDresseur' => $_SESSION['user']->getId(), ':idPokemon'=> $row->id));
    }
   header('location: ../view/pokemonTeam.php?team=1');
}

if (isset($_POST['submitTeam'])){

    $query = $pdo->prepare('SELECT * FROM PokemonList WHERE PokedexNumber = :pokeNum');
    $query->execute(array(':pokeNum' => $_POST['pokeNumber']));
    $row = $query->fetch(PDO::FETCH_OBJ);

    $queryInsert = $pdo->prepare('INSERT INTO PokemonTeam(teamName, id_Dresseur, id_pokemon) VALUE (:name, :idDresseur, :idPokemon)');
    $queryInsert->execute(array(':name'=>$_POST['selectTeam'], ':idDresseur' => $_SESSION['user']->getId(), ':idPokemon'=> $row->id));

    header('location: ../view/pokemonTeam.php?team='.$_POST['selectTeam']);
}

if (isset($_POST['submitTeamName'])){

    $query = $pdo->prepare('SELECT * FROM PokemonList WHERE PokedexNumber = :pokeNum');
    $query->execute(array(':pokeNum' => $_POST['pokeNumber']));
    $row = $query->fetch(PDO::FETCH_OBJ);

    $queryInsert = $pdo->prepare('INSERT INTO PokemonTeam(teamName, id_Dresseur, id_pokemon) VALUE (:name, :idDresseur, :idPokemon)');
    $queryInsert->execute(array(':name'=>$_POST['teamName'], ':idDresseur' => $_SESSION['user']->getId(), ':idPokemon'=> $row->id));

    header('location: ../view/pokemonTeam.php?team='.$_POST['teamName']);
}

if (isset($_POST['displayTeam'])){
    $query = $pdo->prepare('SELECT PokemonTeam.*, PokemonList.pathLogo, PokemonList.name, PokemonList.pokedexNumber FROM PokemonTeam JOIN PokemonList ON PokemonTeam.id_pokemon = PokemonList.id WHERE id_Dresseur = :id_Dresseur AND teamName= :teamname');
    $query->execute(array(':id_Dresseur' => $_SESSION['user']->getId(), ":teamname"=>$_POST['selectTeam']));
    $row = $query->fetchAll(PDO::FETCH_OBJ);
    header('location: ../view/pokemonTeam.php?team='.$_POST['selectTeam']);


}

if (isset($_GET['delete'])) {
    $query = $pdo->prepare("DELETE FROM PokemonTeam WHERE id_pokemon = :id_pokemon");
    var_dump($query->execute(array(':id_pokemon' => $_GET['delete'])));
    header("location: ../view/pokemonTeam.php?team=".$_GET['team']);
}








