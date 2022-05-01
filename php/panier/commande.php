<?php

require_once '../../config.php';
// Commandes(idCommande, idClient, idArticle, qteArticle, dateCommande)

$stockMissing = "COMMANDE REUSSIE";
$msgMissingStock = "";
$total = 0;

function checkStock(&$stockMissing, &$msgMissingStock, $connexion){
    foreach ($_SESSION['cart'] as $idArticle => $qteArticle){
        $requete = 'SELECT idArticle, nomArticle, stock FROM Articles WHERE idArticle =' . $idArticle . ';';
        $resultat = $connexion->prepare($requete);
        $resultat->execute();
        $produit = $resultat->fetch();
        if ($produit['stock']< $qteArticle){
            echo $produit['stock'];
            echo $qteArticle;
            $artRupture = $produit['nomArticle'];
            $stockMissing = "COMMANDE AS ECHOUE";
            $msgMissingStock = "Pas assez de stock de \"$artRupture\"";
            return 0;
        }
    }
    return 1;
}
function addOrderDB(&$msgMissingStock, &$total, $connexion){
    $idClient = $_SESSION['user'];
    foreach ($_SESSION['cart'] as $idArticleInt => $qteArticle) {
        $idArticle = strval($idArticleInt);
        $requete = 'SELECT * FROM Articles WHERE idArticle =' . $idArticle . ';';
        $resultat = $connexion->prepare($requete);
        $resultat->execute();
        $produit = $resultat->fetch();

        $total += $produit['prix'] * $qteArticle;
        $date = date('Y-m-d H:i:s');
        echo $idArticle ;
        echo $produit['stock'];
        echo $qteArticle;
        $insert = $connexion->prepare("INSERT INTO Commandes(idClient,idArticle,qteArticle,prixArticle,img,nomArticle,dateCommande) VALUES(:idClient,:idArticle,:qteArticle,:prixArticle,:img,:nomArticle,:dateCommande)");
        $insert->execute(array(
            'idClient' =>$idClient,
            'idArticle' => $idArticle,
            'qteArticle' => $qteArticle,
            'prixArticle' => $produit['prix'],
            'img' => $produit['img'],
            'nomArticle' => $produit['nomArticle'],
            'dateCommande' => $date
        ));
        
        // augmente le nombre de ventes et diminue le stock dans la table articles
        $insert = $connexion->prepare("UPDATE Articles set nbVentes=:nbVentes , stock=:stock where idArticle = '$idArticle'  ");
        $insert->execute(array(
            'stock' =>  $produit['stock'] - $qteArticle,
            'nbVentes' => $produit['nbVentes'] + $qteArticle


        ));



        $_SESSION['cart'] = array();
    }
    $msgMissingStock = "COMMANDE PASSEE POUR $total EUR !";
}

if (isset($_SESSION['user'])){
    if (checkStock($stockMissing, $msgMissingStock, $connexion)){
        addOrderDB($msgMissingStock, $total, $connexion);
        if ($total == 0){
            header('Location:../../index.php');
        }
    }
    
}
else {
    alert_js("Il faut se connecter pour passer une commande !");
    // sleep(2);
    header('Location:../../connexion2.php');

}
// si il y as assez de stock on ajoute à la bdd, sinon on affiche


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comm. Passée</title>
    <link rel="stylesheet" type="text/css" href="<?= $host ?>css/connexion.css">
    <script src="<?= $host ?>script.js"></script>
</head>

<body>
    <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div>
    <br><br><br><br>
        <div class="bloc">
            <h2><?= $stockMissing ?></h2>
        </div>
        <br><br>
        <div class="message">
        <?= $msgMissingStock ?>
        </div>
        <br><br><br><br>

    <div class="ins">
        
        <a href="../../index.php">Acceuil</a>
    </div>


    </div>
</body>

</html>