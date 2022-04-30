<?php

require_once '../../config.php';

$idArticleInt =  $_GET['recup_id_art'];
$idArticle = strval($idArticleInt);

$_SESSION['cart'][$idArticle] += 1;

// pour debugger, enlever le header pour panier.php
echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');

?>