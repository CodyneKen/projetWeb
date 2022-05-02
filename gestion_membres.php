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

            <form class="barre" method="GET" action="recherche_membres.php">
              
                <input id="searchbar" type="search" name="search" placeholder="recherche">

               
            </form>

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
            Choissisez une categorie de membres à bannir.
            <br>
            <br>
            
            
    </body>
</html>