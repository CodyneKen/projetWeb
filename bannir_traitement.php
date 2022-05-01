<?php
	require_once 'config.php';
    $id = $_POST['idMembre'];
    $supprime = $connexion->prepare("DELETE FROM Articles  where idVendeur = $id ");
    $supprime->execute();
    $supprime = $connexion->prepare("DELETE FROM Membres  where idMembre = $id ");
    $supprime->execute();
    header('Location:membres.php');
 ?>