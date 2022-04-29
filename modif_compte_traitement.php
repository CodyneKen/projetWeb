<?php
	session_start();
	require_once 'config.php';
	$_SESSION['id'] = $_POST['id'];
    $id = $_POST['id'];
    if(isset($_POST['pseudo']) && isset($_POST['adresse']) && isset($_POST['mail']) && isset($_POST['mdp']))
	{
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$adresse = htmlspecialchars($_POST['adresse']);
		$mail = htmlspecialchars($_POST['mail']);
		$mdp = htmlspecialchars($_POST['mdp']);
		
       
	   
        if(strlen($pseudo) <=128){
           
                $insert = $connexion->prepare("UPDATE Membres set pseudo=:pseudo ,adresse=:adresse,mail=:mail,mdp=:mdp where idMembre = '$id' ");
            $insert->execute(array(
                'pseudo' => $pseudo,
                'adresse' => $adresse,
                'mail' => $mail,
                'mdp' => $mdp
                
            ));
            
            $_SESSION['pseudo'] = $pseudo;
            header('Location:compte.php');//a changer apres
            die();
        }
        else{
            header('Location:apropos.html');//achanger apres
        }
	}
?>

