<?php include('/header.php');  ?>

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