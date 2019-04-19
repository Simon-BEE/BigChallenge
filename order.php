<?php 
	include('beerarray.php');
	include ('header.php');
	require 'connect.php';

	if (!$connect) {
		header('Location: index.php');
	}
?>
	<div class="form">
		<h2 class="">Bon de commande</h2>

		
			<form class="form" method="POST" action="http://localhost/hardcore/confirmationCommande.php"><!--
				
							<label>Prénom</label>
							<input class="" type="text" name="firstname" placeholder="Votre prénom" required>
				
							<label>Nom</label>
							<input class="" type="text" name="lastname" placeholder="Votre nom" required>

							<label>Adresse</label>
							<input class="" type="text" name="address" placeholder="Votre adresse" required>


							<label>Code postal</label>
							<input class="" type="text" name="zipcode" placeholder="Votre code postal" required>

							<label>Ville</label>
							<input class="" type="text" name="city" placeholder="Nom de la ville" required>


							<label>Pays</label>
							<input class="" type="text" name="country" placeholder="Nom du pays" required>


							<label>Téléphone</label>
							<input class="" type="text" name="tel" placeholder="Votre numéro de téléphone" required>


							<label>Mail</label>
							<input class="" type="text" name="mail" placeholder="Votre adresse mail" required>
-->
				<div id="BDC">
					<table class="">
						<thead class="">
							<tr>
								<th>Nom de la bière</th>
								<th>Prix HT</th>
								<th>Prix TTC</th>
								<th>Quantité</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($beerArray as $key => $value) : ?>
								<tr>
									<td><?= $value[0] ?></td>
									<td id="pht_<?= $key ?>"><?= number_format($value[3], 2, ',', '.') ?>€</td>
									<td id="pttc_<?= $key ?>"><?= number_format($value[3] * $tva, 2, ',', '.') ?>€</td>
									<!-- name="quantity[]", permet d'envoyer un tableau de quantités -->
									<!-- dans la méthode getNewPrice, on envoie l'id de l'objet, l'input complet avec tout ces attribut, le prix de base de la biere -->
									<td><input style="" type="number" name="quantity[]"  min="0" value="0" oninput="getNewPrice(<?= $key ?>, this, <?= $value[3] ?>)" /></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>

						<button type="submit">COMMANDER</button>

				</div>
			</form>
		</div>

	<script type="text/javascript">
		function getNewPrice(id, quantity, originPrice) {
			//On récupère l'objet HTML qui a l'id "pht_"+id
			//Donc si id = 0 alors on ira récupérer l'objet html qui a l'id "pht_0"
			//Ne pas hésiter à utiliser l'inspecteur pour bien comprendre
			var objHT = document.getElementById('pht_'+id);

			//Même principe qu'au dessus
			var objTTC = document.getElementById('pttc_'+id);

			//On multiplie le prix d'origine de la biere sélectionnée à la valeur du champs quantité de la bière
			var newPrice = originPrice * quantity.value;

			//On multiplie le prix à 1.2(TVA) pour obtenir le prix TTC
			var TTCprice = newPrice *1.2;

			if(quantity.value > 0) {
				//toFixed(2) permet de limiter de 2 le nombre de chiffre apres la virgule de la variable newPrice
				//String permet de convertir(Caster) le résultat en chaine de caractère
				//Puis replace('.', ',') va remplacer les "." par des ","
				//Exemple: 12.56 deviendra 12,56
				objHT.innerHTML = String(newPrice.toFixed(2)).replace('.', ',')+'€';
				objTTC.innerHTML = String(TTCprice.toFixed(2)).replace('.', ',')+'€';
			}
		}
	</script>

<?php include('footer.php'); ?>