<?php
	
	require_once 'config.php';

	if(isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['password_retype']))
	{
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$nom = htmlspecialchars($_POST['nom']);
		$mail = htmlspecialchars($_POST['mail']);
		$adresse = htmlspecialchars($_POST['adresse']);
	    $password = htmlspecialchars($_POST['password']);
	    $password_retype = htmlspecialchars($_POST['password_retype']);
	    $check = $connexion->prepare('SELECT pseudo, mdp from clients');
	    $check->execute(array($pseudo));
	    $data = $check->fetch();
	    $row = $check->rowCount();
	    echo "dsds";
	    if($row==0)
	    {

	    	 echo "dsds";
	    	if(strlen($pseudo) <=100)
	    	{
	    		 echo "dsds";
	    		if($password == $password_retype)
	    		{ echo "meme mdp";
	    			


	    			$insert = $connexion->prepare("INSERT INTO clients(pseudo,prenom,nom,mail,adresse,mdp) VALUES(:pseudo,:prenom,:nom,:mail,:adresse,:mdp)");
	    			 echo "dsds";
	    			$insert->execute(array(
	    				'pseudo' => $pseudo,
	    				'prenom' => $prenom,
	    				'nom' => $nom,
	    				'mail' => $mail,
	    				'adresse' => $adresse,
	    				'mdp' => $password
	    			));
	    			 echo "dsds";
	    			 echo "dsooooods";
	    			header('Location:inscription2.php?reg_err=success');
	    			 echo "dsds";
	    			die();

	    		}
	    	}else {header('Location:inscription2.php?reg_err=pseudo_length');}

	    }else {header('Location:inscription2.php?reg_err=already');}



	}



?>