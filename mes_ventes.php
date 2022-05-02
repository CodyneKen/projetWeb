<?php

// session_start(); -> deplacé dans config.php
require_once 'config.php';



$id = $_SESSION['user'];
$pseudo = $_SESSION['pseudo'];
$check = $connexion->prepare(" SELECT pseudo, typemembre FROM Membres where idMembre  = '$id' ");
$check->execute(array($pseudo));
$data = $check->fetch();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?=$host?>css/categories.css">
    <script src="<?=$host?>script.js"></script>
    <title>accueil</title>
</head>

<body>
   <div id="haut">
        <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div>

        <div class="con">
            
            <?php
            if (!isset($_SESSION['pseudo'])) { 
                ?> <a id="panier"  href="connexion2.php">connexion/Inscription</a> <a id="panier" href="php/panier/panier.php"> &nbsp Mon Panier</a></div> <?php 
            } 
            else { 
                
                ?> <a id="panier" href="compte.php">Bonjour <?php echo $_SESSION['pseudo'] ;?>   </a> <a id="panier" href="php/panier/panier.php"> &nbsp  Mon Panier</a></div> <?php 
            }
            ?>
            
        </div>

            <form class="barre" method="GET" action="recherche_membres.php">
              
                <input id="searchbar" type="search" name="search" placeholder="recherche">

               
            </form>
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
        <div class="vente" >
	Mes ventes
	<br>
	<br>
	<?php

			$requete = "SELECT * FROM Commandes  WHERE idVendeur = ".$id." ";
			
    		/* recupere dans resultat toutes les lignes evc les colonnes QUE L'ON VEUT */
		    $resultat = $connexion->prepare($requete);
		    $resultat->execute();

          while($ligne = $resultat->fetch()) {

				$image = "photos/".$ligne['img'];
							 echo '		<table>
					    <thead>
					        <tr>
					            <th colspan="4">Commande du : '.$ligne['dateCommande'].'</th>
					        </tr>
					    </thead>
					    <tbody>
					    <tr>

					            <td></td>
					            <td>Nom article</td>
					             <td>Prix</td>
					             <td></td>
					            <td>Quantite</td>
					        </tr>
					        <tr>

					            <td><img src="'.$image.'" width="50" height="50" alt="'.$ligne['nomArticle'].'"></td>
					            <td>'.$ligne['nomArticle'].'</td>
					             <td>'.$ligne['prixArticle'] * $ligne['qteArticle']."€".'</td>
					             <td></td>
					            <td>'.$ligne['qteArticle'].'</td>
					        </tr>
					    </tbody>
					</table> ';
					echo "<br>";
					echo "<br>";
                  





		            }
          

		



	?>
        </div>

       

</body>

</html>