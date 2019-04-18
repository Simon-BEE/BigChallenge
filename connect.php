<?php
session_start();

if (isset($_SESSION["connect"])) {
    $connect = $_SESSION["connect"];
}else{
    $connect = false;
}

if(isset($_GET["deconnect"]) && $_GET["deconnect"]){
    unset($_SESSION["connect"]);
} 