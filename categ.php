<?php
// $_SERVER["DOCUMENT_ROOT"]
require_once 'config.php';

// récupère la catégorie depuis l'url/get et l'insère dans les requêtes pdo et l'affichage
if (isset($_GET['categorie'])) {
    $cat = "" . $_GET['categorie'];
} else {
    echo "erreur dans le GET categorie";
}

$requete = 'SELECT idArticle, nomArticle, descriptif, prix, img, stock FROM Articles WHERE categorie ="' . $cat . '";';
/* recupere dans resultat toutes les lignes evc les colonnes QUE L'ON VEUT */
$resultat = $connexion->prepare($requete);

$resultat->execute();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst($cat) ?></title>
    <link rel="stylesheet" type="text/css" href="<?=$host?>css/categories.css">
    <script src="<?=$host?>script.js"></script>
</head>

<body>
  <div id="haut">
        <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div>

        <div class="con">
            
            <?php
            if (!isset($_SESSION['pseudo'])) { 
                ?> <a id="connexion"  href="connexion2.php">connexion/Inscription</a> <a id="panier" href="php/panier/panier.php">  Mon Panier</a></div> <?php 
            } 
            else { 
                
                ?> <a id="compte" href="compte.php">Bonjour <?php echo $_SESSION['pseudo'] ;?>   </a> <a id="panier" href="php/panier/panier.php">   Mon Panier</a><br><a id="deconnexion" href="deconnexion.php">deconnexion</a></div> <?php 
            }
            ?>
            
        </div>

            <form class="barre" method="GET" action="recherche.php">
              
                <input id="searchbar" type="search" name="search" placeholder="recherche">

               
            </form>


           
            <br>
<br>
<br>

        
        <div id="categories">
            Categories :
            <a class="c" href="http://localhost:8000/categ.php?categorie=informatique">Informatique</a>
            <a class="c" href="http://localhost:8000/categ.php?categorie=electromenager">Electromenager</a>
            <a class="c" href="http://localhost:8000/categ.php?categorie=figurine">Figurines</a>
            <a class="c" href="http://localhost:8000/categ.php?categorie=vetement">Vetements</a>
            <a class="c" href="http://localhost:8000/categ.php?categorie=mobilier">Mobilier</a>
            <a class="c" href="http://localhost:8000/categ.php?categorie=poster">Poster</a>
        </div>
        <br>
        <br>
            
    <?php
    while ($ligne = $resultat->fetch()) {
        $image = "photos/" . $ligne['img'];
        $idArticle = $ligne['idArticle'];

        echo "<div class = 'affiche'>";

        echo "<div class = 'box1'>";
        echo $ligne['nomArticle'];
        echo "<br>";
        echo $ligne['prix'] . "€";
        echo "<br>";
        echo "Plus que " . $ligne['stock'] . " articles";
        echo "<br>";
        echo "<br>";

        echo "<form method='GET' action='php/panier/panier_ajout.php' >";
        echo "<button  type='submit' name = 'recup_id_art' value='".$idArticle."'>Ajout au panier</button>";
        echo "</form>";
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
    
</body>

</html>