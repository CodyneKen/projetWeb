<?php
    session_start();
    require_once 'config.php';
    $requete = 'SELECT nomArticle, descriptif, prix, img, stock FROM Articles WHERE categorie = "mobilier"';
    /* recupere dans resultat toutes les lignes evc les colonnes QUE L'ON VEUT */
    $resultat = $connexion->prepare($requete);
    $resultat->execute();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Electromenager</title>
        <link rel="stylesheet" type="text/css" href="categories.css">
    </head>
    <body>
        <div class="logo"><strong>NOZAMA</strong> </div>   
        <div class="barre">
            <input id="searchbar" type="text" name="search" placeholder="recherche">  
        </div> 
        <br>
        <div id = "categories">
            Categories :
            <a class ="c" href = http://localhost:8000/informatique.php>Informatique</a>
            <a class ="c" href = http://localhost:8000/electromenager.php>Electromenager</a>
            <a class ="c"  href = http://localhost:8000/figurine.php>figurine</a>
            <a class ="c" href = http://localhost:8000/vetements.php>Vetements</a>
            <a class ="c" href = http://localhost:8000/mobilier.php>Mobilier</a>
            <a class ="c" href = http://localhost:8000/poster.php>Poster</a>
        </div>
        <br>
        <?php
            while($ligne = $resultat->fetch()) {
                $image = "photos/".$ligne['img'];
                echo "<div class = 'affiche'>";
                echo "<div class = 'box1'>";
                echo $ligne['nomArticle'];
                echo "<br>";
                echo $ligne['prix']."€";
                echo "<br>";
                echo "Plus que ".$ligne['stock']." articles";
                echo "</div>";
                echo "<div class = 'box2'>";
                echo "<img src='$image' class='image' alt='$image' />";
                echo "</div>";
                echo "<div class = 'box3'>";
                echo $ligne['descriptif'];
                echo "</div>";
                echo "</div>";
            }  
            ?>
            <a class = "accueil" href = http://localhost:8000/index.php>Accueil</a>
    </body>
</html>