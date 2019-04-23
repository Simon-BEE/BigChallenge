<?php
require 'connect.php';
require 'db.php';

if ($connect) {
    if (!empty($_POST)) {
        $prenom = ($_POST["prenom"]);
        $nom = ($_POST["nom"]);    
        $address = ($_POST["address"]);
        $zipcode = ($_POST["zipcode"]);
        $ville = ($_POST["ville"]);
        $pays = ($_POST["pays"]);
        $phone = ($_POST["phone"]);
        $id = ($_POST["id"]);
        $password = $_POST["password"];
        $password_verif = $_POST["password_verif"];    
        
        if (!empty($prenom) && !empty($nom) && !empty($address) && !empty($zipcode) && !empty($ville) && !empty($pays) && !empty($phone)) {
            if (!empty($password) && !empty($password_verif)) {
                if(strlen($password) <= 10 && strlen($password) >= 5  && $password = $password_verif){
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    require_once 'db.php';
                    $sql = "UPDATE `users` SET `prenom`= :prenom,`nom`= :nom,`address`= :address,`zipcode`= :zipcode,`ville`= :ville,`pays`= :pays,`phone`= :phone,`password`= :password WHERE `users`.`id` = :id";
                    $statement = $pdo->prepare($sql);
                    $result = $statement->execute([
                        ":nom" => $nom,
                        ":prenom" => $prenom,
                        ":address" => $address,
                        ":zipcode" => $zipcode,
                        ":ville" => $ville,
                        ":pays" => $pays,
                        ":phone" => $phone,
                        ":id" => $id,
                        ":password" => $password
                        ]);
                } else {
                    die('Erreur mot de passe ! <a href="http://localhost/hardcore/profil.php">Revenez sur la page Profil</a>');
                }
            } else {
                require_once 'db.php';
                $sql3 = "UPDATE `users` SET `prenom`= :prenom,`nom`= :nom,`address`= :address,`zipcode`= :zipcode,`ville`= :ville,`pays`= :pays,`phone`= :phone WHERE `users`.`id` = :id";
                $statement3 = $pdo->prepare($sql3);
                $statement3->execute([
                    ":nom" => $nom,
                    ":prenom" => $prenom,
                    ":address" => $address,
                    ":zipcode" => $zipcode,
                    ":ville" => $ville,
                    ":pays" => $pays,
                    ":phone" => $phone,
                    ":id" => $id
                    ]);
                die('Modification réussie ! <a href="http://localhost/hardcore/profil.php">Revenez sur la page Profil</a>');
            }
                
        } else {
            die('Les champs ne sont pas tous remplis ! ! <a href="http://localhost/hardcore/profil.php">Revenez sur la page Profil</a>');
        }
    } else {
        $user = false;
        $id = false;
        $nom = false;    
        $address = false;
        $zipcode = false;
        $ville = false;
        $pays = false;
        $phone = false;
        $password = false;
        $passwordVerif = false;
    }
} else {
    header('Location: ../login.php');
}

header("Location: ../profil.php");