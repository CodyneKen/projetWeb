<?php

require_once '../../config.php';

$idArticleInt =  $_GET['recup_id_art'];
$idArticle = strval($idArticleInt);

$requete = 'SELECT idArticle, nomArticle, stock, categorie FROM Articles WHERE idArticle =' . $idArticle . ';';
$resultat = $connexion->prepare($requete);
$resultat->execute();
$produit = $resultat->fetch();

if ($produit['stock']<= $_SESSION['cart'][$idArticle]){
    // alert("Pas assez de stocks !");
    header('Location:panier.php');

}
else {
    $_SESSION['cart'][$idArticle] += 1;

    // pour debugger, enlever le header pour panier.php
    echo $_SESSION['cart'][$idArticle];

    // pour renvoyer au panier une fois ajouté :
    header('Location:panier.php');
}

