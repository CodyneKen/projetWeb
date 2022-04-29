<?php
	require_once 'config.php';
    $id = $_GET['id'];
    $supprime = $connexion->prepare("DELETE FROM Articles  where idArticle = $id ");
    $supprime->execute();
    header('Location:produits.php');
 ?>