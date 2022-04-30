<?php

require_once '../../config.php';

// on recupere l'id de l'article depuis l'url
$idArticleInt =  $_GET['recup_id_art'];
$idArticle = strval($idArticleInt);

$_SESSION['cart'][$idArticle] -= 1;

if ($_SESSION['cart'][$idArticle] <= 0){
    unset($_SESSION['cart'][$idArticle]);
}

// pour debugger, enlever le header pour panier.php
//echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');

?>