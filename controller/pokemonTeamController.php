<?php

include '../model/User.php';
include '../controller/session.php';

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
        $queryInsert->execute(array(':name'=>'Blabla', ':idDresseur' => $_SESSION['user']->getId(), ':idPokemon'=> $row->id));
    }

   header('location: ../view/pokemonTeam.php?team=1');
}

$query = $pdo->prepare('SELECT PokemonTeam.*, PokemonList.pathLogo, PokemonList.name, PokemonList.pokedexNumber FROM PokemonTeam JOIN PokemonList ON PokemonTeam.id_pokemon = PokemonList.id WHERE id_Dresseur = :id_Dresseur');
$query->execute(array(':id_Dresseur' => $_SESSION['user']->getId()));
$row = $query->fetchAll(PDO::FETCH_OBJ);

if ($row == '') {
    echo "Vous n'avez pas de pokemon dans votre équipe";
}


if (isset($_GET['delete'])) {
    $query = $pdo->prepare("DELETE FROM PokemonTeam WHERE id_pokemon = :id_pokemon");
    var_dump($query->execute(array(':id_pokemon' => $_GET['delete'])));
    header('location: ../view/pokemonTeam.php?team=1');
}






