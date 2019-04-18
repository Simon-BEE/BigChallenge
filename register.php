<?php include('/header.php');  ?>

<section class="form">
    <form method="POST" action="">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" required>

        <label for="nom">Nom de famille</label>
        <input type="text" name="nom" required>

        <label for="address">Adresse</label>
        <input type="text" name="address" required>

        <label for="zipcode">Code Postal</label>
        <input type="text" name="zipcode" required>

        <label for="ville">Ville</label>
        <input type="text" name="ville" required>

        <label for="pays">Pays</label>
        <input type="text" name="pays" required>

        <label for="email">Adresse email</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>

        <input class="button" type="submit" name="submit_c" value="S'inscrire">
    </form>
    <p>Déjà inscrit ? <a href="login.php">Connectez-vous</a> !</p>
</section>

<?php include('/footer.php');  ?>