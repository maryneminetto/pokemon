<?php

include_once '../model/User.php';
include_once 'session.php';


if (isset($_POST['connect'])){

    $userMail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect = $pdo->prepare('SELECT * FROM `user` WHERE `email`=:id');
        $connect->execute(array(":id"=>$userMail));

        $row = $connect->fetchAll(PDO::FETCH_OBJ);

        foreach ($row as $item){

            if ($item->email){
                if (password_verify($userPassword,$item->password)){
                    $user = new User($item->firstName, $item->lastName, $item->email, $item->id);
                    $_SESSION['user'] = $user;
                    $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root','');
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $connection = $pdo->prepare('UPDATE `user` SET `last_connected_at`= NOW() WHERE `id`='.$item->id);
                    $connection->execute();
                    header('Location: ../view/accueil.php');
                }
            }

        }

    } catch (Exception $e) {
        var_dump($e);
    }

}
