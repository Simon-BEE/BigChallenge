<?php 
    include('/header.php'); 
    require 'beerarray.php';
?>

<section class="products">
    <?php for ($i=0; $i < count($beerArray); $i++) : ?>
    <article class="product">
        <h2><?= $beerArray[$i][0] ?></h2>
        <img src="<?= $beerArray[$i][1] ?>">
        <p><?= substr((string)$beerArray[$i][2],0,150) ?></p>
        <p><?= number_format($beerArray[$i][3]*1.2, 2, ',', '.') ?>€</p>
    </article>
    <?php endfor; ?>
</section>

<?php include('/footer.php'); ?>