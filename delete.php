<?php
require 'connect.php';
require 'db.php';

if ($connect) {
    require_once 'db.php';
    /*$sql2 = "SELECT * FROM users WHERE `email`= :email";
    $state = $pdo->prepare($sql2);
    $state->execute([":email" => $_SESSION["email"]]);
    $usermail = $state->fetch();*/

    if(isset($usermail)){
    $id = $usermail["id"];
    $sql = "DELETE FROM `users` WHERE `id`= ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);

    header('Location: index.php');
}
} else {
    header('Location : login.php');
}