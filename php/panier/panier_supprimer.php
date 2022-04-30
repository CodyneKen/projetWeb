<?php

require_once '../../config.php';


$idArticleInt =  $_GET['recup_id_art'];
$idArticle = strval($idArticleInt);

unset($_SESSION['cart'][$idArticle]);

// pour debugger, enlever le header pour panier.php
//echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');

?>