<?php
/* require 'db.php';
require 'beerarray.php';

$sql = 'INSERT INTO `bieres`(`titre`, `img`, `description`, `prix`) VALUES (:titre, :img, :description, :prix)';
foreach ($beerArray as $element) {
    var_dump($element);
    $statement = $pdo->prepare($sql);
    $result = $statement->execute([
        ":titre" => $element[0],
        ":img" => $element[1],
        ":description" => $element[2],
        ":prix" => $element[3]
    ]);
} */