<?php 
include('header.php');
include('beerarray.php');
require 'connect.php';
if (!$connect) {
	header('Location: index.php');
}
if(isset($_POST['quantity'])) {
	$quantity =  $_POST['quantity'];
	$totalTTC = 0;
	$lineTTC = 0;
	$totalHT = 0;
	$quantiteTotal = 0;
	$j = 0;
	$tabIds = [];
	for ($i=0; $i < count($quantity) ; $i++) { 
		$quantite = $quantity[$i];
		if ($quantite > 0) {
			$totalHT += $beerArray[$i][3]*$quantite;
			$totalTTC += $beerArray[$i][3]*$quantite*$tva;
			$quantiteTotal += $quantite;
			$tabIds[$j++] = $beerArray[$i][0];
		}
	}
require_once 'db.php';
$serial = serialize($tabIds);
$sql = 'INSERT INTO `commande` (`id_client`, `ids_product`, `prixttc`) VALUES (:id_client, :ids_product, :prixttc)';
$statement = $pdo->prepare($sql);
$result = $statement->execute([
              ':id_client'  => $usermail['id'], 
              ':ids_product'   => $serial,
              ':prixttc' => $totalTTC
               ]);
?>

<section class="table">
	<table style="width: 80%; text-align:center;" class="confirmation">
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
						<td><?= number_format(($value[3] * $tva)*$quantity[$key], 2, ',', '.') ?>€</td>
					</tr>
					<?php
						$lineTTC += ($value[3] * $tva)*$quantity[$key];
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
	<p style="text-align: center;">Celle-ci vous sera livrée au <strong><?= $usermail['address'] . '</strong> à <strong>' . $usermail['ville'] ?></strong> sous deux jours.</p>
	<p style="text-align:center;">Un de numéro de suivi vous sera communiqué sur votre adresse mail dès que la commande sera envoyé.</p>
	<p style="text-align:center;"><a href="http://localhost/hardcore/order.php">J'en veux encore ! </a></p>
</section>
		
<?php } ?>
<?php include('footer.php'); ?>