
<?php
   
    require_once 'config.php';
    $host = "http://localhost:8000/";


    $requete = 'SELECT nomArticle, descriptif, prix, img, stock FROM Articles';
    /* recupere dans resultat toutes les lignes evc les colonnes QUE L'ON VEUT */
    $resultat = $connexion->prepare($requete);
    $resultat->execute();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>inscription</title>
        <link rel="stylesheet" type="text/css" href="<?=$host?>css/style.css">
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
</div>


            
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
            Choissisez une categorie de produit à modifier.
            <br>
            <br>
            <a href = gestion_membres.php>Gestion utilisateurs</a>
            <br>
            <br>
            <a href = gestion_commentaire.php>Gestion commentaire</a>
            <br>
            <br>

            <a href = http://localhost:8000/ajout_produit.php>Mettre un article en vente</a>
            
    </body>
</html>