<?php

if (isset($_POST['firstName'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userMail = $_POST['userEmail'];
    $userPassword = password_hash($_POST['userPassword'],PASSWORD_DEFAULT);

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['registerSubmit'])){
            $queryRegister = 'INSERT INTO `user`(`firstName`,`lastName`,`email`,`password`,`created_at`)
                          VALUES ("'.$firstName.'",
                                  "'.$lastName.'",
                                  "'.$userMail.'",
                                  "'.$userPassword.'",
                                  "'.date("Y-m-d").'"
                                  )';
            $pdo->exec($queryRegister);
            header('Location: ../view/index.php');
        }

    } catch (Exception $e) {
        var_dump($e);
    }

}