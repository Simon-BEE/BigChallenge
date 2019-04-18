<?php include('/header.php');  ?>

<section class="profil">

    <div class="welcome">
        <h2>Bonjour, <!--<?= $username ?>-->.</h2>
        <p>Content de te revoir !</p>
    </div>

    <div class="modifier form">
        <h2>Tu peux modifier tes informations personnelles</h2>
        <form class="" method="POST" action="update.php">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" >

            <label for="nom">Nom de famille</label>
            <input type="text" name="nom">

            <label for="address">Adresse</label>
            <input type="text" name="address">

            <label for="zipcode">Code Postal</label>
            <input type="text" name="zipcode">

            <label for="ville">Ville</label>
            <input type="text" name="ville">

            <label for="pays">Pays</label>
            <input type="text" name="pays">

            <label for="password">Mot de passe</label>
            <input type="password" name="password">

            <input class="button" type="submit" name="submit_c" value="Modifier">
        </form>
    </div>

    <div class="commandes">
        <h2>Récapitulatif de tes anciennes commandes</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</section>

<?php include('/footer.php');  ?>