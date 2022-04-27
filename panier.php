<?php

    session_start();
    require_once 'config.php';
    $requete = 'SELECT idArticle, nomArticle, descriptif, prix, img, stock FROM Articles';
    /* recupere dans resultat toutes les lignes */
    $resultat = $connexion->prepare($requete);
    $resultat->execute();


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
	<div class="panier content-wrapper">
		<!-- ds ce h1, on as remplacé onclick="header('Location:index.php')" par onclick="goHomepage()" -->
		<h1 onclick="goHomepage()">NOZAMA</h1>

		<h2>Panier d'achat</h2>
		<form action="index.php?page=panier" method="post">
			<table>
				<thead>
					<tr>
						<td colspan="2">produit</td>
						<td>Prix</td>
						<td>Quantité</td>
						<td>Total</td>
					</tr>
				</thead>
				<tbody>
					<!-- si le panier/cart n'existe pas :  , sinon on itere sur les elements du cart -->
					<?php
					$cart = $_SESSION['cart'];

					echo $cart;
					echo "test";
					if (!isset($cart)) {
						echo "<tr>" ;
						echo "<td colspan='5'>Vous n'avez aucun produit ajouté dans votre panier</td>";
					}
						
					else {
						// numprod permet de garder trace du nombre de produits affichés pour decaler l'affichage successif
							foreach ($cart as $idArticle) {
								$requete = 'SELECT idArticle, nomArticle, descriptif, prix, img, stock FROM Articles WHERE idArticle =' . $idArticle . ';';
								$resultat = $connexion->prepare($requete);
								$resultat->execute();
								$produit = $resultat->fetch(); 
								// afficheProduit($produit);
                    ?>
                                    <tr>   
                                        <td class="img">   
                                            <a href="index.php?page=produit&id=<?=$produit['id']?>">   
                                                <img src="imgs/<?=$produit['img']?>" width="50" height="50" alt="<?=$produit['nomArticle']?>">   
                                            </a>
                                        </td>   
                         <td><a href="index.php?page=produit&id=<?=$produit['id']?>"><?=$produit['nomArticle']?></a>   
                                            <br>   
                                            <a href="index.php?page=panier&remove=<?=$produit['id']?>" class="remove"><i class="fas fa-trash">&nbsp;</i>Supprimer </a></td>   
                                        <td class="prix">&euro;<?=$produit['prix']?></td>   
                                        <td class="quantité"><input type="number" name="quantité-<?=$produit['id']?>" value="<?=$produits_in_panier[$produit['id']]?>" min="1" max="<?=$produit['quantité']?>" placeholder="quantité" required></td>   
                      <td class="prix">&euro;<?=$produit['prix']*$produits_in_panier[$produit['id']]?></td>   
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

