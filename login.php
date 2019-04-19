<?php 
require 'db.php';
require 'connect.php';
include('/header.php');

if ($connect) {
    header("Location: index.php");
}
if(!empty($_POST)){
    $email = strtolower($_POST["email"]);
    $password = $_POST["password"];
    if (!empty($email) && !empty($password)){
        //recuperation users
        require_once 'db.php';
        $sql2 = "SELECT * FROM users WHERE `email`= :email";
        $state = $pdo->prepare($sql2);
        $state->execute([":email" => $email]);
        $usermail = $state->fetch();
        
        /* verifier couple user / mdp */
        if(isset($usermail)){
            if (password_verify($password, $usermail["password"])){
                    $_SESSION["connect"] = true;
                    $_SESSION["email"] = $email;
                    header("Location: profil.php");
            }else{
                header("HTTP/1.0 403 Forbidden");
                echo 'Email ou Mot de passe incorrect 01!<br /><a href="login.php">Réessayer</a>';
            }
        }else{
            header("HTTP/1.0 403 Forbidden");
            echo 'Email ou Mot de passe incorrect 02!<br /><a href="login.php">Réessayer</a>';
        }
    }else{
        header("HTTP/1.0 403 Forbidden");
        echo 'Email ou Mot de passe incorrect 03!<br /><a href="login.php">Réessayer</a>';
    }
}



?>

<section class="form">
    <form method="POST" action="">
        <label for="email">Adresse mail</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>

        <input class="button" type="submit" name="submit_c" value="Se connecter">
    </form>
    <p>Pas encore inscrit ? <a href="register.php">Inscrivez-vous</a> !</p>
</section>

<?php include('/footer.php');  ?>