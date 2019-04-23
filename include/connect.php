<?php
session_start();
require 'db.php';

if (isset($_SESSION["connect"])) {
    $connect = $_SESSION["connect"];
    $sql2 = "SELECT * FROM users WHERE `email`= :email";
    $state = $pdo->prepare($sql2);
    $state->execute([":email" => $_SESSION["email"]]);
    $usermail = $state->fetch();
}else{
    $connect = false;
}

if(isset($_GET["deconnect"]) && $_GET["deconnect"]){
    unset($_SESSION["connect"]);
} 