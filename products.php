<?php 
    include('/header.php'); 
    require 'beerarray.php';
?>

<section id="beer-choice">
    <?php for ($i=0; $i < count($beerArray); $i++) : ?>
    <article class="product beer">
        <h2><?= $beerArray[$i][0] ?></h2>
        <img src="<?= $beerArray[$i][1] ?>">
        <p class="beerP"><?= substr((string)$beerArray[$i][2],0,150) ?></p>
        <p class="price"><?= number_format($beerArray[$i][3]*1.2, 2, ',', '.') ?>€</p>
    </article>
    <?php endfor; ?>
</section>

<?php include('/footer.php'); ?>