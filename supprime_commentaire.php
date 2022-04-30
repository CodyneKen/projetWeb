<?php
	require_once 'config.php';
    $id = $_POST['idCommentaire'];
    $supprime = $connexion->prepare("DELETE FROM Commentaires  where idCommentaire = $id ");
    $supprime->execute();
    header('Location:gestion_commentaire.php');
 ?>