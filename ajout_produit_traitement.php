<?php
	
	require_once 'config.php';

    if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['quantite']) && isset($_POST['categorie']) && isset($_POST['descriptif']))
	{
		$nom = htmlspecialchars($_POST['nom']);
		$prix = htmlspecialchars($_POST['prix']);
		$quantite = htmlspecialchars($_POST['quantite']);
		$categorie = htmlspecialchars($_POST['categorie']);
		$descriptif = htmlspecialchars($_POST['descriptif']);
        $img = $_POST['image'];
	    /*$check = $connexion->prepare('SELECT pseudo, mdp from membres');
	    $check->execute(array($pseudo));*/
        if(strlen($nom) <=128){
            $insert = $connexion->prepare("INSERT INTO Articles(nomArticle,descriptif,prix,idVendeur,img, stock, categorie) VALUES(:nomArticle,:descriptif,:prix,:idVendeur, :img, :stock, :categorie)");
            $insert->execute(array(
                'nomArticle' => $nom,
                'descriptif' => $descriptif,
                'prix' => $prix,
                'idVendeur' => 2,// à changer lorsque inscription conexion fonctionnera
                'img' =>$img,
                'stock' => $quantite,
                'categorie' => $categorie
            ));
            header('Location:index.php');//a changer apres
            die();
        }
        else{
            header('Location:apropos.html');//achanger apres
        }
	}
?>