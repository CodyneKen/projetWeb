<?php

session_start();
require_once 'config.php';
$host = "http://localhost:8000/";


?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>NOZAMA</title>
        <link rel="stylesheet" type="text/css" href="<?=$host?>css/categories.css">
        <script src="<?=$host?>script.js"></script>

    </head>
    <body>


<div id="haut">
        <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div>

        <div class="con">
            
            <?php
            if (!isset($_SESSION['pseudo'])) { 
                ?> <a id="panier"  href="connexion2.php">connexion</a> <a id="panier" href="php/panier/panier.php">Mon Panier</a></div> <?php 
            } 
            else { 
                
                ?> <a id="panier" href="compte.php">Bonjour <?php echo $_SESSION['pseudo'] ;?>   </a> <a id="panier" href="php/panier/panier.php"> &nbsp  Mon Panier</a></div> <?php 
            }
            ?>
            
        </div>

            <form class="barre" method="GET" action="recherche_modif_prod.php">
              
                <input id="searchbar" type="search" name="search" placeholder="recherche">

               
            </form>



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

        <?php
        require_once 'config.php';
        $recherche = $_GET['search'];
        
        $requete = "SELECT idArticle ,nomArticle, descriptif, prix, img, stock FROM Articles WHERE nomArticle LIKE '". $recherche ."%'"; 
        /* recupere dans resultat toutes les lignes evc les colonnes QUE l'ON VEUT */
        $resultat = $connexion->prepare($requete);
        $resultat->execute();
        while($ligne = $resultat->fetch()){



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
        <a class = "accueil" href = http://localhost:8000/index.php>Accueil</a>
    </body>
</html>