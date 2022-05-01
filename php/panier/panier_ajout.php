<?php

require_once '../../config.php';


// on recupere l'id de l'article depuis l'url
$idArticleInt =  $_GET['recup_id_art'];

// on met l'id en string pour l'utiliser avec les dictionnaires
$idArticle = strval($idArticleInt);

$requete = 'SELECT idArticle, nomArticle, stock, categorie FROM Articles WHERE idArticle =' . $idArticle . ';';
$resultat = $connexion->prepare($requete);
$resultat->execute();
$produit = $resultat->fetch();
echo 'test';
if ($produit['stock']< 1){
    // alert_js('Article en rupture de stock pour le moment !');
    sleep(1);
    $pageCategorie = $produit['categorie'];
    header('Location:../../categ.php?categorie='.$pageCategorie);

}
else{
  $_SESSION['cart'][$idArticle] = 1;

// pour debugger, enlever le header pour panier.php
echo $idArticle ;
echo $_SESSION['cart'][$idArticle];

// pour renvoyer au panier une fois ajouté :
header('Location:panier.php');
}

?>