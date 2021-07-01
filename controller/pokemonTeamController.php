<?php

include '../model/User.php';
include 'session.php';


if (isset($_GET['number'])){

    $number = $_GET['number'];
    $user = $_SESSION['user'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $addPoke = $pdo->prepare('INSERT INTO `pokemonteam`(`teamName`, `id_Dresseur`, `id_pokemon`) VALUES (:name, :idUser , :idPoke)');
        $addPoke->execute(array(":name"=>"My Pokemon Team", ":idUser"=>$user->getId(), ":idPoke"=>$number));
        var_dump($addPoke);

    } catch (Exception $e) {
        var_dump($e);
    }

}



    try {
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $getTeam = $pdo->prepare('SELECT * FROM `pokemonteam`');
        $getTeam->execute();
        $row = $getTeam->fetchAll(PDO::FETCH_OBJ);


    }catch (Exception $e) {
        var_dump($e);
    }






