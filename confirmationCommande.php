<?php 
include('header.php');
include('beerarray.php');
require 'connect.php';
if (!$connect) {
	header('Location: index.php');
}
if(isset($_POST['quantity'])) :
		$totalTTC = 0; 
?>

<section class="table">
	<table style="width: 80%;margin-left:10%; text-align:center;" class="">
		<thead>
			<tr>
				<th>Nom de la bière</th>
				<th>Prix HT</th>
				<th>Prix TTC</th>
				<th>Quantité</th>
				<th>Total TTC</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($beerArray as $key => $value) :
				if($_POST['quantity'][$key] > 0) : ?>
					<tr>
						<td><?= $value[0] ?></td>
						<td><?= number_format($value[3], 2, ',', '.')?>€</td>
						<td><?= number_format($value[3] * $tva, 2, ',', '.') ?>€</td>
						<td><?= $_POST['quantity'][$key] ?></td>
						<td><?= number_format(($value[3] * $tva)*$_POST['quantity'][$key], 2, ',', '.') ?>€</td>
					</tr>
					<?php
						$totalTTC += ($value[3] * $tva)*$_POST['quantity'][$key];
				endif ;
			endforeach; ?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><strong><?= number_format($totalTTC, 2, ',', '.') ?>€</strong></td>
			</tr>
		</tbody>
	</table>
	<p style="text-align: center;">Celle-ci vous sera livrée au <!-- ADDRESSE --> sous deux jours</p>
	<p style="text-align:center;">
		<small>Si vous ne réglez pas sous 10 jours, le prix de votre commande sera majorée.(25%/jours de retard)</small>
	</p>
	<p style="text-align:center;"><a href="http://localhost/hardcore/order.php">J'en veux encore ! </a></p>
</section>
		
<?php endif; ?>
<?php include('footer.php'); ?>