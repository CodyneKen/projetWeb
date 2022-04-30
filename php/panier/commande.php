<?php

require_once '../../config.php';
// Commandes(idCommande, idClient, idArticle, >>QTEARTICLE<<, dateCommande)
$total = 0;
$idClient = $_SESSION['user'];

foreach ($_SESSION['cart'] as $idArticleInt => $qteArticle) {
    $idArticle = strval($idArticleInt);
    $requete = 'SELECT idArticle, prix, stock, nbVentes FROM Articles WHERE idArticle =' . $idArticle . ';';
    $resultat = $connexion->prepare($requete);
    $resultat->execute();
    $produit = $resultat->fetch();

    $total += $produit['prix'] * $qteArticle;
    $date = date('Y-m-d H:i:s');
    echo $idArticle ;
    $insert = $connexion->prepare("INSERT INTO Commandes(idClient,idArticle,qteArticle,dateCommande) VALUES(:idClient,:idArticle,:qteArticle,:dateCommande)");
    $insert->execute(array(
        'idClient' =>$idClient,
        'idArticle' => $idArticle,
        'qteArticle' => $qteArticle,
        'dateCommande' => $date
    ));



    $insert = $connexion->prepare("UPDATE Articles set nbVentes=:nbVentes , stock=:stock where idArticle = '$idArticle'  ");
            $insert->execute(array(
                'stock' =>  $produit['stock'] - $qteArticle,
                'nbVentes' => $produit['nbVentes'] + $qteArticle
                
                
            ));

    $_SESSION['cart'] = array();
}
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
            <h2>COMMANDE REUSSIE</h2>
        </div>
        <br><br>
        <div class="bloc">
        </div>
        <br><br><br><br>

    <div class="ins">
        COMMANDE PASSEE POUR <?= $total ?> EUR !<br>
        <a href="../../index.php">Acceuil</a>
    </div>


    </div>
</body>

</html>