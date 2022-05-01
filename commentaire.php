<?php

session_start();
require_once 'config.php';
$id = $_SESSION['user'];

$message = htmlspecialchars($_POST['message']);
$insert = $connexion->prepare("INSERT INTO Commentaires(dateCommentaire, mess, idMembre) VALUES(:dateCommentaire, :mess, :idMembre)");
$temps = time();
$today = date('Y-m-d', $temps);
$insert->execute(array(
    'dateCommentaire' => $today,
    'mess' => $message,
    'idMembre' => $id
));
header('Location:index.php');
die();

?>
