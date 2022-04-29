<?php
    session_start();
    require_once 'config.php';
    $categorie = $_GET['c'];
			
    
			$requete = "SELECT idArticle, nomArticle, descriptif, prix, img, stock FROM Articles where categorie='$categorie'";
    		/* recupere dans resultat toutes les lignes evc les colonnes QUE L'ON VEUT */
		    $resultat = $connexion->prepare($requete);
		    $resultat->execute();
    /*
    $requete = 'SELECT nomArticle, descriptif, prix, img, stock FROM Articles';
    
    $resultat = $connexion->prepare($requete);
    $resultat->execute();
    */

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>inscription</title>
        <link rel="stylesheet" type="text/css" href="css/categories.css">
        <script src="script.js"></script>
    </head>
    <body>
        <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div> 
            <a id = 'accueil' href="index.php">Accueil</a>
            <br>
            <br>
            <br>
            
            <div id = "categories">
            	 Produits
            Categories :
            <a class ="c" href =http://localhost:8000/produits.php?c=informatique>Informatique</a>
            <a class ="c" href = http://localhost:8000/produits.php?c=electromenager>Electromenager</a>
            <a class ="c"  href = http://localhost:8000/produits.php?c=figurine>figurine</a>
            <a class ="c" href = http://localhost:8000/produits.php?c=vetements>Vetements</a>
            <a class ="c" href = http://localhost:8000/produits.php?c=mobilier>Mobilier</a>
            <a class ="c" href = http://localhost:8000/produits.php?c=poster>Poster</a>


          
            </div>
            <br>
            <div class="texte">
             <?php
            	echo $categorie ;
                 echo "<br>";
                 ?>
                 </div>
             <?php
	    		$adresse = $_SERVER['PHP_SELF'];
	    		$i = 0;
			    foreach($_GET as $cle => $valeur){
			        $adresse .= ($i == 0 ? '?' : '&').$cle.($valeur ? '='.$valeur : '');
			        $i++;
			    }
    			
			
			
			
			 echo "<br>";

            while($ligne = $resultat->fetch()) {
               
               $image = "photos/".$ligne['img'];
                echo "<div class = 'affiche'>";
                echo "<div class = 'box1'>";
                echo $ligne['nomArticle'];
                echo "<br>";
                echo $ligne['prix']."€";
                echo "<br>";
                echo "Plus que ".$ligne['stock']." articles";
                echo "<br>";
                echo "<br>";
                echo "<a href='produit.php?id=".$ligne['idArticle'].">< button id='ajouter' > Modifier article </button></a>";
                echo "</div>";
                echo "<div class = 'box2'>";
                echo "<img src='$image' class='image' alt='$image' />";
                echo "</div>";
                echo "<div class = 'box3'>";
                echo $ligne['descriptif'];
                echo "</div>";
                echo "</div>";
            }  
            ?>
            
            
    </body>
</html>