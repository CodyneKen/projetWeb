<?php

session_start();
require_once 'config.php';

if(isset($_SESSION['user'])){
    $message = htmlspecialchars($_POST['message']);
    $pseudo = $_SESSION['user'];
    $insert = $connexion->prepare("INSERT INTO commentaire(nom,prenom,email,commentaire,Idcom,pseudo) VALUES(:nom,:prenom,:email,:commentaire,:Idcom,:pseudo)");
    $insert->execute(array(
        'nom' => $_SESSION['nom'],
        'prenom' => $_SESSION['prenom'],
        'email' => $_SESSION['email'],
        'commentaire' => $message,
        'Idcom' => NULL,
        'pseudo' => $pseudo
    ));
    header('Location:index.php?reg_err=success');
    die();
}


?>