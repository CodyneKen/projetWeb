<?php

require_once '../../config.php';


// on recupere l'id de l'article depuis l'url
if (isset($_GET['recup_id_art'])) {
    $idArticle =  $_GET['recup_id_art'];
} else {
    echo "erreur dans le GET recup_id_art";
}

// on initialise l'article dans le panier s'il n'y etais pas, puis on ajoute 1 exemplaire
// $cart = $_SESSION['cart'];
if (!isset($_SESSION['cart'][$idArticle])) {
    echo "Problème, panier non existant";
}

unset($_SESSION['cart'][$idArticle]);

// pour debugger, enlever le header pour panier.php
//echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');
