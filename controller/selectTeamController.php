<?php

include_once '../model/User.php';
include_once 'session.php';

$user = $_SESSION['user'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryGetTeam = $pdo->prepare('SELECT * FROM `pokemonTeam` WHERE `id_Dresseur`= :user GROUP BY `teamName`');
        $queryGetTeam->execute(array(':user'=>$user->getId()));
        $row2 = $queryGetTeam->fetchAll(PDO::FETCH_OBJ);

    } catch (Exception $e) {
        var_dump($e);
    }



if (isset($_POST['submitTeamName'])){

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $queryGetTeam = $pdo->prepare('INSERT INTO `pokemonTeam` (teamName, id_Dresseur, id_Pokemon) VALUES (:name, :idDresseur, :idPoke)');
        $pdo->execute(array(':name'=>$_POST['teamName'], ':idDresseur'=>$user->getId(), ':idPoke'=>$_GET['pokedexNumber']));

        header('Location: ../controller/pokemonTeamController.php?teamName='.$_POST['teamName']."&pokedexNumber=".$_GET['pokedexNumber']);


    } catch (Exception $e) {
        var_dump($e);
    }

}
