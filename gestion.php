
<?php
    session_start();
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
            Choissisez une categorie de produit à modifier.
            <br>
            <br>
            <a href = gestion_membres.php>Gestion utilisateurs</a>
            
            <br>
            <br>

            <a href = http://localhost:8000/ajout_produit.php>Mettre un article en vente</a>
            
    </body>
</html>