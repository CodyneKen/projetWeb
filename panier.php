<?php

session_start();
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Panier</title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
</head>

<body>
	<h1 onclick="goHomepage()">NOZAMA</h1>
	<div class="panier content-wrapper">
		<!-- ds ce h1, on as remplacé onclick="header('Location:index.php')" par onclick="goHomepage()" -->


		<h2 classe="tete_panier">Panier d'achat</h2>
		<form action="index.php?page=panier" method="post">
			<table>
				<thead classe="tete_panier">
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

					echo "test";
					$subtotal = 0;
					if (!isset($_SESSION['cart'])) {
						echo "<tr>";
						echo "<td colspan='5'>Vous n'avez aucun produit ajouté dans votre panier</td>";
					} else {
						$cart = $_SESSION['cart'];
						foreach ($cart as $idArticle) {
							$requete = 'SELECT idArticle, nomArticle, descriptif, prix, img, stock FROM Articles WHERE idArticle =' . $idArticle . ';';
							$resultat = $connexion->prepare($requete);
							$resultat->execute();
							$produit = $resultat->fetch();
							// afficheProduit($produit);
					?>
							<tr>
								<td class="img">
									<img src="imgs/<?= $produit['img'] ?>" width="50" height="50" alt="<?= $produit['nomArticle'] ?>">
								</td>
								<td><?= $produit['nomArticle'] ?></a>
									<br>
									<i>Supprimer </i>
								</td>
								<td class="prix">&euro;<?= $produit['prix'] ?></td>
								<td class="quantité"><input type="number" name="quantité-<?= $produit['id'] ?>" value="<?= $produits_in_panier[$produit['id']] ?>" min="1" max="<?= $produit['quantité'] ?>" placeholder="quantité" required></td>
								<td class="prix">&euro;<?= $produit['prix'] * $cart[$idArticle] ?></td>
							</tr>

					<?php	}
					}
					?>
				</tbody>
			</table>
			<div class="subtotal">
				<span class="text">Prix Total</span>
				<span class="prix">&euro;<?= $subtotal ?></span>
			</div>
			<br>
			<div class="buttons">
				<input type="submit" value="Passer la commande" name="placerCommande">
			</div>
		</form>
	</div>
</body>

</html>