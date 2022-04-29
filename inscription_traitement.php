<?php

	require_once 'config.php';
	
	if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_retype'])){
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$nom = htmlspecialchars($_POST['nom']);
		$mail = htmlspecialchars($_POST['mail']);
		$adresse = htmlspecialchars($_POST['adresse']);
	    $password = htmlspecialchars($_POST['password']);
		$mdp_crypte = SHA1(SHA1($password).SHA1($nom));
		$type = $_POST['type'];
	    $password_retype = htmlspecialchars($_POST['password_retype']);
		if(strlen($pseudo) <= 100){
	    	if($password == $password_retype){
				$insert = $connexion->prepare("INSERT INTO Membres(pseudo,prenom,nom,mail,adresse,mdp, typemembre) VALUES(:pseudo,:prenom,:nom,:mail,:adresse,:mdp, :typemembre)");
				$insert->execute(array(
					'pseudo' => $pseudo,
					'prenom' => $prenom,
					'nom' => $nom,
					'mail' => $mail,
					'adresse' => $adresse,
					'mdp' => $mdp_crypte,
					'typemembre' => $type
				));
				header('Location:index.php');
				//header('Location:inscription2.php?reg_err=success');
				die();
	    	}
			else{
				header('Location:compte.php');
				//header('Location:inscription2.php?reg_err=pseudo_length');
			}
	    }
		else{
			header('Location:ajout_produit.php');
			//header('Location:inscription2.php?reg_err=already');
		}
	}
?>