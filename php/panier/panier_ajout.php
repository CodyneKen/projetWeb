<?php

require_once '../../config.php';


// on recupere l'id de l'article depuis l'url
$idArticleInt =  $_GET['recup_id_art'];

// on met l'id en string pour l'utiliser avec les dictionnaires
$idArticle = strval($idArticleInt);
$_SESSION['cart'][$idArticle] = 1;

// pour debugger, enlever le header pour panier.php
echo $idArticle ;
echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');

?>