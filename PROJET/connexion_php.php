<?php
  session_start();
  require_once 'config.php';

  if(isset($_POST['pseudo']) && isset($_POST['password']))
  {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);

    $check = $connexion->prepare('SELECT pseudo, mdp FROM clients where mdp = ?');
    $check->execute(array($password));
    $data = $check->fetch();
    $row = $check->rowCount();


    if($row!=0)
    {
      
      if($data['mdp'] === $password)
      {
        $_SESSION['user'] = $data['pseudo'];
        header('Location:index.php');
      }else {



        echo "\nnombre ligne : $row\n";

                                echo "$password";
                                echo "1222.{$data['mdp']}";
                                echo $data['mdp'] == $password ;
                                echo "<pre>";
                                print_r($data);
                                echo "</pre>";
                              /*header('Location:index.php?login_err=password');*/}




    }else {
     
      header('Location:connexion2.php');

    }




  }else header('Location:connexion2.php');

 
?>

