<?php
	
	require_once 'config.php';
    $id = $_GET['id'];
    if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['quantite']) && isset($_POST['categorie']) && isset($_POST['descriptif']))
	{
		$nom = htmlspecialchars($_POST['nom']);
		$prix = htmlspecialchars($_POST['prix']);
		$quantite = htmlspecialchars($_POST['quantite']);
		$categorie = htmlspecialchars($_POST['categorie']);
		$descriptif = htmlspecialchars($_POST['descriptif']);
        $img = $_POST['image'];
        echo $_POST['image'];
	    /*$check = $connexion->prepare('SELECT pseudo, mdp from membres');
	    $check->execute(array($pseudo));*/
        if(strlen($nom) <=128){
            if($img==""){
                $insert = $connexion->prepare("UPDATE Articles set nomArticle=:nomArticle ,descriptif=:descriptif,prix=:prix,idVendeur=:idVendeur, stock=:stock, categorie=:categorie where idArticle = '$id' ");
            $insert->execute(array(
                'nomArticle' => $nom,
                'descriptif' => $descriptif,
                'prix' => $prix,
                'idVendeur' => 2,// à changer lorsque inscription conexion fonctionnera
                'stock' => $quantite,
                'categorie' => $categorie
            ));
            }else{
                $insert = $connexion->prepare("UPDATE Articles set nomArticle=:nomArticle ,descriptif=:descriptif,prix=:prix,idVendeur=:idVendeur,img=:img, stock=:stock, categorie=:categorie where idArticle = '$id' ");
            $insert->execute(array(
                'nomArticle' => $nom,
                'descriptif' => $descriptif,
                'prix' => $prix,
                'idVendeur' => 2,// à changer lorsque inscription conexion fonctionnera
                'img' =>$img,
                'stock' => $quantite,
                'categorie' => $categorie
            ));
            }
            
            header('Location:produits.php?'.$_POST['image'].'');//a changer apres
            die();
        }
        else{
            header('Location:apropos.html');//achanger apres
        }
	}
?>

