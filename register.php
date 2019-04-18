<?php 
require 'db.php';
include('/header.php');
require 'connect.php';

if ($connect) {
    header("Location: index.php");
}


if(!empty($_POST)){
    $prenom = ($_POST["prenom"]);
    $nom = ($_POST["nom"]);    
    $address = ($_POST["address"]);
    $zipcode = ($_POST["zipcode"]);
    $ville = ($_POST["ville"]);
    $pays = ($_POST["pays"]);
    $phone = ($_POST["phone"]);
    $email = ($_POST["email"]);
    $password = $_POST["password"];
    $passwordVerif = $_POST["password_verif"];
    if (!empty($prenom) && !empty($nom) && !empty($address) && !empty($zipcode) && !empty($ville) && !empty($pays) && !empty($phone) && !empty($email) && !empty($password)){
        require_once 'db.php';
        $sql2 = "SELECT * FROM users WHERE `email`= :email";
        $state = $pdo->prepare($sql2);
        $state->execute([":email" => $email]);
        $usermail = $state->fetch();
        
        if (!$usermail) {
            if(strlen($password) <= 10 && strlen($password) >= 5){
                if($password === $passwordVerif){
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    require_once 'db.php';
                    $sql = 'INSERT INTO users (prenom, nom, address, zipcode, ville, pays, phone, email, password) VALUES (:prenom, :nom, :address, :zipcode, :ville, :pays, :phone, :email, :password)';
                    $statement = $pdo->prepare($sql);
                    $result = $statement->execute([
                        ":prenom" => $prenom,
                        ":nom" => $nom,
                        ":address" => $address,
                        ":zipcode" => $zipcode,
                        ":ville" => $ville,
                        ":pays" => $pays,
                        ":phone" => $phone,
                        ":email" => $email,
                        ":password" => $password
                    ]);

                    if($result){
                        $_SESSION["connect"] = true;
                        $_SESSION["nom"] = $nom;
                        header("Location: profil.php");
                    }else{
                        die("erreur enregistrement en bdd");
                        // TODO : signaler erreur
                    }

                }else{
                    die("mdp différents");
                    // TODO : signaler que mdp non identiques
                }
            }else{
                // TODO : signaler que mdp est pas d'un bon format
                die("mdp pas bon format");
            }
        }else{
            die("utilisateur existe");
            // TODO : signaler que nom existe
        }
    
    }else{
        die('Il manque des champs');
    }
}

?>
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

        <label for="phone">Téléphone</label>
        <input type="text" name="phone" required>

        <label for="email">Adresse email</label>
        <input type="email" name="email" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required>

        <label for="password">Verification mot de passe</label>
        <input type="password" name="password_verif" required>

        <input class="button" type="submit" name="submit_c" value="S'inscrire">
    </form>
    <p>Déjà inscrit ? <a href="login.php">Connectez-vous</a> !</p>
</section>

<?php include('/footer.php');  ?>