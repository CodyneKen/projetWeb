<?php

require_once '../../config.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Panier</title>
	<link rel="stylesheet" href="<?=$host?>css/style.css">
	<script src="<?=$host?>script.js"></script>
</head>

<body>
	<h1 onclick="goHomepage()">NOZAMA</h1>
	<div class="panier content-wrapper">
		<!-- ds ce h1, on as remplacé onclick="header('Location:index.php')" par onclick="goHomepage()" -->


		<h2 class="tete_panier">Panier d'achat</h2>
			<table>
				<thead class="tete_panier">
					<tr>
						<td colspan="2">Produit</td>
						<td>Prix</td>
						<td>Quantité</td>
						<td>Total</td>
					</tr>
				</thead>
				<tbody>
					<!-- si le panier/cart n'existe pas :  , sinon on itere sur les elements du cart -->
					<?php

					$total = 0;
					if (empty($_SESSION['cart'])) {
						echo "<tr>";
						echo "<td colspan='5' class='message'>Vous n'avez aucun produit ajouté dans votre panier</td>";
					} else {
						// $cart = $_SESSION['cart'];
						foreach ($_SESSION['cart'] as $idArticleInt => $qteArticle) {
							$idArticle = strval($idArticleInt);
							$requete = 'SELECT idArticle, nomArticle, descriptif, prix, img, stock FROM Articles WHERE idArticle =' . $idArticle . ';';
							$resultat = $connexion->prepare($requete);
							$resultat->execute();
							$produit = $resultat->fetch();

							$total += $produit['prix'] * $qteArticle;

							$image = $host."photos/" . $produit['img'];
							
							// afficheProduit($produit);
					?>
							<tr>
								<td class="img">
									<img src="<?= $image ?>" width="50" height="50" alt="<?= $produit['nomArticle'] ?>">
								</td>
								<td class="nom_produit"><?= $produit['nomArticle'] ?>
									<br>
									
								</td>
								<td class="prix"><?= $produit['prix'] ?>&euro;</td>
								<!-- récupère le nombre d'article voulu dans le car de session -->
								<td class="quantité"><?= $qteArticle  ?></td>
								<!-- calcul du total pour cet article -->
								<td class="prix"><?= $produit['prix'] *  $qteArticle?>&euro;</td>
								<!-- bouton d'ajout d'article -->
								<td>
									<form method='GET' action='panier_plus.php'>
										<button type='submit' name='recup_id_art' value='<?= $idArticle ?>'><i>+1 </i></button>
									</form>
								</td>
								<!-- bouton de suppression d'article -->
								<td>
									<form method='GET' action='panier_moins.php'>
										<button type='submit' name='recup_id_art' value='<?= $idArticle ?>'><i>-1 </i></button>
									</form>
								</td>
								<!-- enlever l'article du panier (se fait tout seul si on a mis 0 articles) -->
								<td>
									<form method='GET' action='panier_supprimer.php'>
										<button type='submit' name='recup_id_art' value='<?= $idArticle ?>'><i>Supprimer </i></button>
									</form>
								</td>
							</tr>

					<?php	}
					}
					?>
				</tbody>
			</table>
			<br>
			<div class="subtotal">
				<span class="text">Prix Total</span>
				<span class="prix"><?= $total ?>&euro;</span>
			</div>
			<br>
			<div class="buttons">
				<form    action='commande.php'  >
					<button type='submit' name='recup_id_art' value='pip'>Passer la commande </button>
				</form>
				
				

			</div>
	</div>
</body>

</html>