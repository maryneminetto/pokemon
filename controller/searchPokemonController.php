<?php

include_once '../model/PokemonRepo.php';
include_once 'session.php';

function search($str){
    if(isset($str)){
        $name = $str;
        foreach ($_SESSION['pokeList'] as $poke){
            if($poke->getName() == $name){
                header('location: ../view/search.php');
                return $poke;
            }
        }
    }
}







