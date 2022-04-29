<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>inscription</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="script.js"></script>

    </head>
    <body>
        <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div> 
            <a id = 'accueil' href="index.php">Accueil</a>
            <br>
            <br>
            <br>
            <form action="ajout_produit_traitement.php" method="post">
                <h3>Ajout d'articles</h3>       
                <div class="bloc">
                    <input type="text" name="nom"  placeholder="Nom article" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <h3>Prix en euros</h3>
                    <input type="number" name="prix"  min="1" value="1" placeholder="Prix en euros" required="required" autocomplete="off" step="0.01">
                </div>
                <div class="bloc">
                    <h3>quantite</h3>
                    <input type="number" name="quantite" min="1" value="1" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <br>
                    <textarea name="descriptif" placeholder="Descriptif" rows="10" cols="86" required="required" autocomplete="off"></textarea>
                </div>
                <h3>Categories</h3>
                <div>
                    <input type="radio" id="informatique" name="categorie" value="informatique">
                    <label for="informatique">Informatique</label>
                </div>
                <div>
                    <input type="radio" id="electromenager" name="categorie" value="electromenager">
                    <label for="electromenager">Electromenager</label>
                </div>
                <div>
                    <input type="radio" id="vetement" name="categorie" value="vetement">
                    <label for="vetement">Vêtement</label>
                </div>
                <div>
                    <input type="radio" id="figurine" name="categorie" value="figurine">
                    <label for="figurine">Figurine</label>
                </div>
                <div>
                    <input type="radio" id="mobilier" name="categorie" value="mobilier">
                    <label for="mobilier">Mobiler</label>
                </div>
                <div>
                    <input type="radio" id="poster" name="categorie" value="poster">
                    <label for="poster">Poster</label>
                </div>
                <h3>Image</h3>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <label> Ajouter une image : <input type="file" name="image"></label><br>
                <div class="bloc">
                    <button type="submit" >Ajouter article</button>
                </div>   
            </form>
        </div>
    </body>
</html>