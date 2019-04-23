<?php 
include('/include/header.php');
require '/include/connect.php';

if (!$connect) {
    header("Location : index.php");
}

?>
<section class="congrats">
    <p>Félicitations, l'inscription est réussie. Tu peux désormais avoir accès à ta page <a href="profil.php">profile</a> et passer <a href="">commande</a> !</p>
</section>

<?php include('/include/footer.php'); ?>