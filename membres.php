<?php
    session_start();
    require_once 'config.php';
    $categorie = $_GET['c'];
			
    
			$requete = "SELECT * FROM Membres where typemembre='$categorie'";
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
		           Membres
		            Categories :
		  <a class ="c" href =membres.php?c=client>Membres simple</a>
		  <a class ="c" href = membres.php?c=vendeur>Vendeurs</a>
        
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
               
               
                echo "<div class = 'affiche'>";
                echo "<div class = 'box1'>";
                echo "id : ".$ligne['idMembre'];
                echo "<br>";
                echo "pseudo : ".$ligne['pseudo'];
                echo "<br>";
                echo "prenom : ".$ligne['prenom'];
                echo "<br>";
                echo "nom : ".$ligne['nom'];
                echo "<br>";
                echo "adresse mail : ".$ligne['mail'];
                echo "<br>";
                echo "adresse : ".$ligne['adresse'];
                echo "<br>";
                echo '<form action="bannir_traitement.php" method="post">';
                echo '<button type="submit" name="idMembre" value="'.$ligne['idMembre'].'" >Bannir</button></a>';
                
            	echo '</form>'; 
                echo "</div>";
               
                
                echo "</div>";
            }  
            ?>
            
            
    </body>
</html>