<?php
	require_once 'config.php';
    $id = $_POST['idMembre'];
    $supprime = $connexion->prepare("DELETE FROM Membres  where idMembre = $id ");
    $supprime->execute();
    header('Location:membres.php');
 ?>