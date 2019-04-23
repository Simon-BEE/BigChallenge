<?php 
include('/include/header.php');
require '/include/db.php';
require '/include/connect.php';

if ($connect) {
    /*require_once 'db.php';
    $sql2 = "SELECT * FROM users WHERE `email`= :email";
    $state = $pdo->prepare($sql2);
    $state->execute([":email" => $_SESSION["email"]]);
    $usermail = $state->fetch();*/
    if ($usermail) {
        $prenom = $usermail["prenom"];
        $id = $usermail["id"];
        $nom = $usermail["nom"];    
        $address = $usermail["address"];
        $zipcode = $usermail["zipcode"];
        $ville = $usermail["ville"];
        $pays = $usermail["pays"];
        $phone = $usermail["phone"];
        $password = $usermail["password"];
    } else {
        $prenom = false;
        $id = false;
        $nom = false;    
        $address = false;
        $zipcode = false;
        $ville = false;
        $pays = false;
        $phone = false;
        $password = false;
    }  
} else {
    header('Location: login.php');
}


?>

<section class="profil">

    <div class="welcome">
        <h2>Bonjour, <?= $prenom ?>.</h2>
        <p>Envie d'une petite bière ? <a href="order.php">Passe une commande</a> !</p>
    </div>

    <div class="modifier form">
        <h2>Tu peux modifier tes informations personnelles</h2>
        <form class="" method="POST" action="http://localhost/hardcore/include/update.php">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="<?= $prenom ?>" required>

            <label for="nom">Nom de famille</label>
            <input type="text" name="nom" value="<?= $nom ?>" required>

            <label for="address">Adresse</label>
            <input type="text" name="address" value="<?= $address ?>" required>

            <label for="zipcode">Code Postal</label>
            <input type="text" name="zipcode" value="<?= $zipcode ?>" required>

            <label for="ville">Ville</label>
            <input type="text" name="ville" value="<?= $ville ?>" required>

            <label for="pays">Pays</label>
            <input type="text" name="pays" value="<?= $pays ?>" required>

            <label for="phone">Téléphone</label>
            <input type="text" name="phone" value="<?= $phone ?>" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password">

            <label for="password_verif">Retaper votre mot de passe</label>
            <input type="password" name="password_verif">

            <input type="hidden" name="id" value="<?= $id ?>">

            <input class="button" type="submit" name="submit_c" value="Modifier">
        </form>
    </div>

    <div class="commandes">
        <h2>Récapitulatif de tes anciennes commandes</h2>

        <?php
        $sql1 = 'SELECT * FROM `commande` WHERE id_client = ?';
        $statements1 = $pdo->prepare($sql1);
        $statements1->execute([$usermail["id"]]);
        $result1 = $statements1->fetchAll();
        //var_dump($result1); die();
        if ($result1) {
            //var_dump($result1); die();
            for ($i=0; $i < count($result1) ; $i++) { 
                $tabRecap[$i] = unserialize($result1[$i][2]);
                echo "<h3>Commande n°" . $result1[$i][0] . "</h3><br />";
                for ($j=0; $j < count($tabRecap[$i]) ; $j++) {
                    //var_dump($tabRecap); die();
                    echo $tabRecap[$i][$j] . "<br />";
                }
                //echo $tabRecap[$i][$i] . "<br />";
                echo "<p class='totalTTC'>Pour un total de " . $result1[$i][3] . "€</p><br /><br />";
            }
        }else{
            echo "<p>Vous n'avez pas encore passé de commandes ! <a href=\"order.php\">Passez une commande</a> !";
        }
        ?>
    </div>

    <p>T'as fait le tour ? <a href="index.php?deconnect=true">Déconnecte toi</a></p>
    <p><a class="deconnect" href="http://localhost/hardcore/include/delete.php">Supprimer mon compte</a> (⚠ IRREVERSIBLE ⚠)</p>

</section>

<?php include('/include/footer.php');  ?>