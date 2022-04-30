<?php

session_start();
require_once 'config.php';
$pseudo = $_SESSION['pseudo'];
$requete = "SELECT idMembre FROM Membres WHERE pseudo = '$pseudo'";
/* recupere dans resultat toutes les lignes evc les colonnes QUE l'ON VEUT */
$resultat = $connexion->prepare($requete);
$resultat->execute();
$ligne = $resultat->fetch();
$message = htmlspecialchars($_POST['message']);
$insert = $connexion->prepare("INSERT INTO Commentaires(dateCommentaire, mess, idMembre) VALUES(:dateCommentaire, :mess, :idMembre)");
$temps = time();
$today = date('Y-m-d', $temps);
$insert->execute(array(
    'dateCommentaire' => $today,
    'mess' => $message,
    'idMembre' => $ligne['idMembre']
));
header('Location:index.php');
die();

?>
