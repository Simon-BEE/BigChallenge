<?php
require 'config.php';
$bdd = 'mysql:dbname='.$dbname.';host='.$dbhost.';charset=UTF8';
try {
    $pdo = new PDO($bdd,$dbuser,$dbpass);
} catch (PDOException $e) {
    echo 'Connexion échouée';
}