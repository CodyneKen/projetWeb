<?php
  session_start();
  require_once 'config.php';

  if(isset($_POST['pseudo']) && isset($_POST['password'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
    $check = $connexion->prepare('SELECT pseudo, mdp FROM Membres where mdp = ?');
    $check->execute(array($password));
    $data = $check->fetch();
    if($data['mdp'] === $password){
      $_SESSION['user'] = $data['pseudo'];
      header('Location:index.php');
    }
    else {
      header('Location:connexion.php');
      /*header('Location:index.php?login_err=password');*/
    }
  }
  else{
    header('Location:connexion2.php');
  }
?>

