<?php
session_start();

require_once 'config.php';
$host = "http://localhost:8000/";
$id = $_SESSION['user'];

$check = $connexion->prepare("SELECT idMembre, pseudo,prenom,nom,mail,adresse,mdp FROM Membres where idMembre  = '$id' ");
$check->execute(array($id));
$data = $check->fetch();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$host?>css/compte.css">
	<script src="<?=$host?>script.js"></script>

	<title>compte</title>
</head>

<body>



	<div class="haut">
		<div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div>
		<div class="barre"><input id="searchbar" type="text" name="search" placeholder="recherche"> </div>
		<div class="co">
			<?php


			if (!isset($_SESSION['pseudo'])) {
				echo "<a id=\"con\" href=\"connexion2.php\">connexion</a> <a id=\"panier\" href=\"panier.php\">Mon Panier</a> <a id=\"deco\" href=\"deconnexion.php\">deconnexion</a></div>";
			} else {
				echo "<a id=\"con\" href=\"index.php\">{$_SESSION['pseudo']}</a> <a id=\"panier\" href=\"panier.php\">Mon Panier</a></div><a id=\"deco\" href=\"deconnexion.php\">deconnexion</a></div> ";
			}

			?>

		</div>
		<br>
		<br>
		<br>
		<div id="categories">
			Categories :
			<a class="c" href=http://localhost:8000/categ.php?categorie=informatique>Informatique</a>
			<a class="c" href=http://localhost:8000/categ.php?categorie=electromenager>Electromenager</a>
			<a class="c" href=http://localhost:8000/categ.php?categorie=figurine>Figurines</a>
			<a class="c" href=http://localhost:8000/categ.php?categorie=vetements>Vetements</a>
			<a class="c" href=http://localhost:8000/categ.php?categorie=mobilier>Mobilier</a>
			<a class="c" href=http://localhost:8000/categ.php?categorie=poster>Poster</a>
		</div>
		<br>
		<br>
		<form action="modifier_compte.php" method="post">
			<?php
			echo '<button type="submit" name="idMembre" value="' . $data['idMembre'] . '">Modifier compte</button>';
			?>
		</form>

		<br>


		<div class="compte">
			Votre Compte
			<br>
			<br>
			<div id="bloc">

				<div class="mes_infos">Mes informations:
					<br>
					<?php


					echo " pseudo : {$data['pseudo']}
					    		<br> NOM : {$data['nom']}
					    	  <br> PRENOM : {$data['prenom']}
					    	  <br> ADRESSE : {$data['adresse']}
					    	  <br> MAIL : {$data['mail']} ";

					?>
					<br>
					<a class="accueil" href=http://localhost:8000/index.php>Accueil</a>
				</div>
				<div class="mes_commandes">Mes commandes:
				</div>

			</div>


		</div>
</body>

</html>