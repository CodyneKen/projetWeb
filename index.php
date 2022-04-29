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
    <link rel="stylesheet" type="text/css" href="<?=$host?>css/style.css">
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
                
                ?> <a id="con" href="compte.php">Bonjour <?php $_SESSION['pseudo'] ?> </a><br> <a id="panier" href="php/panier/panier.php">Mon Panier</a></div> <?php 
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

        <div id="promo">
            <h2>Promotions</h2>
            <h3>ROG Zephyrus M16 GU603HE avec NVIDIA GeForce RTX 3050 Ti</h3>
            <img src="photos/pc_asus.webp" class='image' alt="PC gamer asus" /><br>
            <p class='ancien_prix'>1799,99 € </p>
            <p class='nouveau_prix'>1499,99 €</p>
            Économisez 300,00 € <br>
            <h3>Table salle à manger bois massif pied mikado 240 cm MELBOURNE</h3>
            <img src="photos/table_bois.jpg" class='image' alt="table bois" /><br>
            <p class='ancien_prix'>1349,00 € </p>
            <p class='nouveau_prix'>1199,99 €</p>
            Économisez 149,01 € <br>
            <h3>Réfrigérateur Américain LG GSXV90MCAE INSTAVIEW </h3>
            <img src="photos/frigo1.jpeg" class='image' alt="frigo" /><br>
            <p class='ancien_prix'>2999, 00 € </p>
            <p class='nouveau_prix'>1999,00 €</p>
            Économisez 1000 € <br>
        </div>
        <div id="meilleures_ventes">
            <h2>Meilleures Ventes</h2>
            <h3>Réfrigérateur Américain LG GSXV90MCAE INSTAVIEW </h3>
            <img src="photos/frigo1.jpeg" class='image' alt="frigo" /><br>
            <p class='ancien_prix'>2999, 00 € </p>
            <p class='nouveau_prix'>1999,00 €</p>
            Économisez 1000 € <br>
            <h3>Table salle à manger bois massif pied mikado 240 cm MELBOURNE</h3>
            <img src="photos/table_bois.jpg" class='image' alt="table bois" /><br>
            <p class='ancien_prix'>1349,00 € </p>
            <p class='nouveau_prix'>1199,99 €</p>
            Économisez 149,01 € <br>
        </div>
        <br>

        <a href=http://localhost:8000/apropos.html>A propos de NOZANA</a>
        <?php
        if (isset($_SESSION['user'])) {
            echo "<button id=\"contacter\" onclick=\"Afficher()\">Nous contacter !</button>";
        } else {
            echo "<div>Pour laisser un commentaire connectez vous s'il vous plait.</div>";
        }
        ?>
        <br>
        <br>
        <?php
        if ($data['typemembre'] == 'vendeur') {
            echo "<a href = http://localhost:8000/ajout_produit.php>Mettre un article en vente</a>";
        }
        ?>
 <?php
                if($data['typemembre'] == 'admin'){
                    echo "<a href = http://localhost:8000/gestion.php>gestion produit</a>";
                }
            ?>
</body>
<footer>
    <form id="form1" action="commentaire.php" method="post">
        <fieldset>
            <legend><strong>Commentaire</strong></legend>
            <label for="message"></label>
            <textarea id="message" name="message" rows="10" cols="86" required="required"></textarea><br>
        </fieldset>
        <button id="enlever" onclick="Enlever()">Masquer formulaire </button>
        <input type="submit" value="Envoyer le message" onclick="verifierDonnees()" />
        <input type="reset" value="Effacer" />
    </form>
</footer>

</body>

</html>
