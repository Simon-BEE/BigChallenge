<?php
require 'db.php';
require 'connect.php';
include ('header.php');
$message = "";
if (!$connect) {
    if (!empty($_POST['email'])) {
        $mail = $_POST['email'];
        require_once 'db.php';
        $sql2 = "SELECT * FROM users WHERE `email`= :email";
        $state = $pdo->prepare($sql2);
        $state->execute([":email" => $mail]);
        $usermail = $state->fetch();
        $userId = $usermail[0];
        if ($usermail[8] == $mail) {
            $random = rand(000000,999999);
            $newpass = password_hash($random, PASSWORD_BCRYPT);
            require_once 'db.php';
            $sql = "UPDATE `users` SET `password`= :password WHERE `users`.`id` = :id";
            $statement = $pdo->prepare($sql);
            $result = $statement->execute([
                ":password" => $newpass,
                ":id" => $userId
                ]);
            mail($mail, 'Nouveau Password', $random);
            $message = "Un email vient de vous être envoyé.";
        } else {
            $message = "Nous ne connaissons pas cette adresse email !";
        }

    }
} else {
    header('Location: index.php');
}

?>

<section class="form">
    <p>Nous allons vous envoyer un mot de passe provisoire par email :</p>
    <form method="POST" action="">
        <label for="email">Adresse email</label>
        <input type="email" name="email" required>

        <input class="button" type="submit" name="submit_e" value="Envoyer">
        <p class="deconnect"><?= $message ?></p>
    </form>
</section>

<?php include ('footer.php'); ?>