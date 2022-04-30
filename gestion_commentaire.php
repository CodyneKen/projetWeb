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
        <form class="barre" method="GET" action="recherche.php">
            <input id="searchbar" type="search" name="search" placeholder="recherche">
        </form>
        <div class="co">
            <?php
            if (!isset($_SESSION['pseudo'])) { 
                ?> <a id="con" href="connexion2.php">connexion</a><br> <a id="panier" href="php/panier/panier.php">Mon Panier</a></div> <?php 
            } 
            else { 
                
                ?> <a id="con" href="compte.php">Bonjour <?php echo $_SESSION['pseudo']; ?> </a><br> <a id="panier" href="php/panier/panier.php">Mon Panier</a></div> <?php 
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
	Commentaire(s) :
	<br>
	<br>
	<?php

			$requete = "SELECT Membres.pseudo,  Commentaires.idMembre, dateCommentaire,mess ,idCommentaire FROM Commentaires , Membres WHERE Commentaires.idMembre = Membres.idMembre ";
			
    		/* recupere dans resultat toutes les lignes evc les colonnes QUE L'ON VEUT */
		    $resultat = $connexion->prepare($requete);
		    $resultat->execute();


		


while($ligne = $resultat->fetch()) {
               
              
                echo "<div class = 'affiche'>";
                
                echo "idMembre : ".$ligne['idMembre'];
                echo "<br>" ;
                 echo "pseudo : ".$ligne['pseudo'];
                echo "<br>" ;
                echo "date commentaire : ".$ligne['dateCommentaire'];
                echo "<div class = 'box3'>";
                echo $ligne['mess'];
                echo "</div>";
                echo "<br>" ;
                 echo '<form action="supprime_commentaire.php" method="post">';
                echo '<button type="submit" name="idCommentaire" value="'.$ligne['idCommentaire'].'" >Supprimer commentaire</button></a>';
                
            	echo '</form>'; 
                echo "</div>";
                
            	echo "<br>" ;

            }  
	?>

       

</body>

</html>
