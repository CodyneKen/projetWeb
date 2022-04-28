<?php
  session_start();
  require_once 'config.php';

  if(isset($_POST['pseudo']) && isset($_POST['password'])){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
    $check = $connexion->prepare("SELECT pseudo, mdp, nom FROM Membres where pseudo = '$pseudo'");
    $check->execute(array($password));
    $data = $check->fetch();
      $mdp_crypte = SHA1(SHA1($password).SHA1($data['nom']));
      if($data['mdp'] === $mdp_crypte){
        $_SESSION['user'] = $data['pseudo'];
        header('Location:index.php');
      }
      else{
      echo "lala";
      echo "<br>";
      echo "ici ".$data['mdp'];
      echo "<br>";
      echo $mdp_crypte;
      }
      //header('Location:connexion.php');
      /*header('Location:index.php?login_err=password');*/
  }
  else{
    header('Location:connexion2.php');
  }
?>

