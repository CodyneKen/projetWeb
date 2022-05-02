<?php

session_start();
require_once 'config.php';
$host = "http://localhost:8000/";


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
                ?> <a id="panier"  href="connexion2.php">connexion/Inscription</a> <a id="panier" href="php/panier/panier.php"> &nbsp Mon Panier</a></div> <?php 
            } 
            else { 
                
                ?> <a id="panier" href="compte.php">Bonjour <?php echo $_SESSION['pseudo'] ;?>   </a> <a id="panier" href="php/panier/panier.php"> &nbsp  Mon Panier</a><br><a id="panier" href="deconnexion.php">deconnexion</a></div> <?php 
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

        
        <form class="co" action="inscription_traitement.php" method="post">
		
                    
            
            <form action="inscription_traitement.php" method="post">
                <h2 >Inscription</h2>       
                <div class="bloc">
                    <input type="text" name="pseudo"  placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="text" name="prenom"  placeholder="prenom" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="text" name="nom"  placeholder="nom" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="text" name="mail"  placeholder="adresse-mail" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="text" name="adresse"  placeholder="adresse" required="required" autocomplete="off">
                </div>
               
                <div class="bloc">
                    <input type="password" name="password"  placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="password" name="password_retype"  placeholder="Verif-mot de passe" required="required" autocomplete="off">
                </div>
                <h3>Cilent ou Vendeur</h3>
                <div class="bloc" required="required" >
                    <input type="radio" id="client" name="type" value="client" >
                    <label for="client">Client</label>
                </div>
                <div class="bloc" >
                    <input type="radio" id="vendeur" name="type" value="vendeur" >
                    <label for="vendeur">Vendeur</label>
                </div>
                <div class="bloc">
                    <button type="submit" >Inscription</button>
                </div>   
            </form>
        </div>
                
  
        </div>
</body>
</html>