<?php
    session_start();
    require_once 'config.php';
    $host = "http://localhost:8000/";

    $requete = 'SELECT nomArticle, descriptif, prix, img, stock FROM Articles';
    /* recupere dans resultat toutes les lignes evc les colonnes QUE L'ON VEUT */
    $resultat = $connexion->prepare($requete);
    $resultat->execute();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>inscription</title>
        <link rel="stylesheet" type="text/css" href="<?=$host?>css/style.css">
        <script src="<?=$host?>script.js"></script>

    </head>
    <body>
        <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div> 
            <a id = 'accueil' href="index.php">Accueil</a>
            <br>
            <br>
            <br>
            
            <div id = "categories">
            	 Membres
            Categories :
            <a class ="c" href =membres.php?c=client>Membres simple</a>
            <a class ="c" href = membres.php?c=vendeur>Vendeurs</a>
            


			


           
            </div>
            <br>
            Choissisez une categorie de membres à bannir.
            <br>
            <br>
            
            
    </body>
</html>