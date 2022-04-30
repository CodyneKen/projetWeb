<?php

require_once '../../config.php';


// on recupere l'id de l'article depuis l'url
/*
if (isset($_GET['recup_id_art'])) {
    $idArticle =  $_GET['recup_id_art'];
} else {
    echo "erreur dans le GET recup_id_art";
}
*/

$idArticleInt =  $_GET['recup_id_art'];
$idArticle = strval($idArticleInt);

// $_SESSION['cart'][$idArticle] += 1;
$_SESSION['cart'][$idArticle] = $_SESSION['cart'][$idArticle] + 1;

// pour debugger, enlever le header pour panier.php
echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');

?>