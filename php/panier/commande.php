<?php

require_once '../../config.php';
// Commandes(idCommande, idClient, idArticle, >>QTEARTICLE<<, dateCommande)
$total = 0;
$idClient = $_SESSION['user'];

foreach ($_SESSION['cart'] as $idArticleInt => $qteArticle) {
    $idArticle = strval($idArticleInt);
    $requete = 'SELECT idArticle, prix, stock FROM Articles WHERE idArticle =' . $idArticle . ';';
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

    $_SESSION['cart'] = array();
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>connexion</title>
    <link rel="stylesheet" type="text/css" href="<?= $host ?>css/connexion.css">
    <script src="<?= $host ?>script.js"></script>
</head>

<body>
    <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div>
    <br>
    <br>
    <br>
    <br>
    <form class="co" action="connexion_php.php" method="post">
        <div class="bloc">
            <h2>COMMANDE REUSSIE</h2>
            <input name="pseudo" placeholder="pseudo" required="required" autocomplete="off">
        </div>
        <br>
        <br>
        <div class="bloc">
            <input type="password" name="password" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
        <br>
        <br>
        <div class="bloc">
            <button type="submit">Connexion</button>
        </div>
        <br>
        <br>

    </form>
    <div class="ins">
        COMMANDE PASSEE POUR <?= $total ?> EUR !<br>
        <a href="inscription2.php">Inscription</a>
    </div>


    </div>
</body>

</html>