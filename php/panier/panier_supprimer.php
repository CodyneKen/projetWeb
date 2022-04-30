<?php

require_once '../../config.php';

// on initialise l'article dans le panier s'il n'y etais pas, puis on ajoute 1 exemplaire
// $cart = $_SESSION['cart'];
if (!isset($_SESSION['cart'][$idArticle])) {
    echo "Problème, panier non existant";
}

$idArticleInt =  $_GET['recup_id_art'];
$idArticle = strval($idArticleInt);

unset($_SESSION['cart'][$idArticle]);

// pour debugger, enlever le header pour panier.php
//echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');

?>