<?php

require_once '../../config.php';


// on recupere l'id de l'article depuis l'url
if (isset($_GET['recup_id_art'])) {
    $idArticle =  $_GET['recup_id_art'];
} else {
    echo "erreur dans le GET recup_id_art";
}

// on check si le panier exite, sinon on le créé
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// on initialise l'article dans le panier s'il n'y etais pas, puis on ajoute 1 exemplaire
// $cart = $_SESSION['cart'];
if (!isset($_SESSION['cart'][$idArticle])) {
    $_SESSION['cart'][$idArticle] = 0;
}
$_SESSION['cart'][$idArticle] += 1;

// pour debugger, enlever le header pour panier.php
// echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');

?>