<?php

session_start();
require_once 'config.php';
$host = "http://localhost:8000/";


?>

<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset="utf-8">
        <title>NOZAMA</title>
        <link rel="stylesheet" type="text/css" href="<?=$host?>css/style.css">
        <script src="<?=$host?>script.js"></script>

    </head>
    <body>

       <div id="haut">
        <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div>

        <div class="con">
            
            <?php
            if (!isset($_SESSION['pseudo'])) { 
                ?> <a id="connexion"  href="connexion2.php">connexion/Inscription</a> <a id="panier" href="php/panier/panier.php"> Mon Panier</a></div> <?php 
            } 
            else { 
                
                ?> <a id="compte" href="compte.php">Bonjour <?php echo $_SESSION['pseudo'] ;?>   </a> <a id="panier" href="php/panier/panier.php"> Mon Panier</a><br><a id="deconnexion" href="deconnexion.php">deconnexion</a></div> <?php 
            }
            ?>
            
            <form class="barre" method="GET" action="recherche_membres.php">
              
                <input id="searchbar" type="search" name="search" placeholder="recherche">

               
            </form>
            <br>
            <br>
            <br>
<div id="categories">
			Categories :
			<a class="c" href="http://localhost:8000/categ.php?categorie=informatique">Informatique</a>
			<a class="c" href="http://localhost:8000/categ.php?categorie=electromenager">Electromenager</a>
			<a class="c" href="http://localhost:8000/categ.php?categorie=figurine">Figurines</a>
			<a class="c" href="http://localhost:8000/categ.php?categorie=vetements">Vetements</a>
			<a class="c" href="http://localhost:8000/categ.php?categorie=mobilier">Mobilier</a>
			<a class="c" href="http://localhost:8000/categ.php?categorie=poster">Poster</a>
		</div>

      
   
            <br>
            <br>
            <br>
            <form action="ajout_produit_traitement.php" method="post">
                <h3>Ajout d'articles</h3>       
                <div class="bloc">
                    <input type="text" name="nom"  placeholder="Nom article" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <h3>Prix en euros</h3>
                    <input type="number" name="prix"  min="1" value="1" placeholder="Prix en euros" required="required" autocomplete="off" step="0.01">
                </div>
                <div class="bloc">
                    <h3>quantite</h3>
                    <input type="number" name="quantite" min="1" value="1" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <br>
                    <textarea name="descriptif" placeholder="Descriptif" rows="10" cols="86" required="required" autocomplete="off"></textarea>
                </div>
                <h3>Categories</h3>
                <div>
                    <input type="radio" id="informatique" name="categorie" value="informatique">
                    <label for="informatique">Informatique</label>
                </div>
                <div>
                    <input type="radio" id="electromenager" name="categorie" value="electromenager">
                    <label for="electromenager">Electromenager</label>
                </div>
                <div>
                    <input type="radio" id="vetement" name="categorie" value="vetement">
                    <label for="vetement">Vêtement</label>
                </div>
                <div>
                    <input type="radio" id="figurine" name="categorie" value="figurine">
                    <label for="figurine">Figurine</label>
                </div>
                <div>
                    <input type="radio" id="mobilier" name="categorie" value="mobilier">
                    <label for="mobilier">Mobiler</label>
                </div>
                <div>
                    <input type="radio" id="poster" name="categorie" value="poster">
                    <label for="poster">Poster</label>
                </div>
                <h3>Image</h3>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <label> Ajouter une image : <input type="file" name="image"></label><br>
                <div class="bloc">
                    <button type="submit" >Ajouter article</button>
                </div>   
            </form>
        </div>
    </body>
</html>