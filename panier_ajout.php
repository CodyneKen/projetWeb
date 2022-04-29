<?php
session_start();
require_once 'config.php';

// besoin d'ajouter sessionstart() ?
echo "bien entré dans panier_aux";

// on recupere l'id de l'article depuis l'url
if (isset($_GET['idArticle'])) {
    $idArticle =  $_GET['idArticle'];
} else {
    echo "erreur dans le GET idArticle";
}

// on check si le panier exite, sinon on le créé
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// on initialise l'article dans le panier s'il n'y etais pas, puis on ajoute 1 exemplaire
$cart = $_SESSION['cart'];
if (!isset($cart[$idArticle])) {
    $cart[$idArticle] = 0;
}
$cart[$idArticle] += 1;

?>