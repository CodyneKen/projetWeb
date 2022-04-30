<?php

    session_start();
    require_once 'config.php';
    $host = "http://localhost:8000/";

    $id = $_GET['id'];
    $requete = "SELECT idArticle , nomArticle, descriptif, prix, img, stock, categorie FROM Articles where idArticle = '$id'";
    /* recupere dans resultat toutes les lignes evc les colonnes QUE L'ON VEUT */
    $resultat = $connexion->prepare($requete);
    $resultat->execute();
    $ligne = $resultat->fetch();

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
            <?php

            	echo '<form action="modif_produit.php?id='.$ligne["idArticle"].'" method="post">';
            ?>
            
                <h3>Ajout d'articles</h3>       
                <div class="bloc">
                	<?php
                		echo "<input type='text' name='nom' value='".$ligne["nomArticle"]."' required='required' autocomplete='off'>" ;
                	?>
                    
                </div>
                <div class="bloc">
                    <h3>Prix en euros</h3>
					<?php
						echo '<input type="number" name="prix"  min="1" value='.$ligne["prix"].'  required="required" autocomplete="off" step="0.01">';
                		
                	?>

                   
                </div>
                <div class="bloc">
                    <h3>quantite</h3>
                    <?php
                    	echo '<input type="number" name="quantite" min="1" value='.$ligne["stock"].' required="required" autocomplete="off">';
                    ?>
                </div>
                <div class="bloc">
                    <br>
                    <?php
                    	echo '<textarea name="descriptif"  rows="10" cols="86" required="required" autocomplete="off">'.$ligne["descriptif"].'</textarea>';
                    ?>
                </div>
                <h3>Categories</h3>

                <div>

                	<?php 
                		if($ligne["categorie"]=='informatique'){
                			
                		echo '<input type="radio" id="informatique" name="categorie" value="informatique" checked>' ;
                    	
                	}else{
                			
						echo '<input type="radio" id="informatique" name="categorie" value="informatique"  >' ;
                	}
                ?>
                <label for="informatique">Informatique</label>

                    <?php ?>
                    
                </div>
                <div>
                	<?php 
                		if($ligne["categorie"]=="electromenager"){
                		echo '<input type="radio" id="electromenager" name="categorie" value="electromenager" checked>';
                    	
                	}else{

						echo '<input type="radio" id="electromenager" name="categorie" value="electromenager">' ;
                	}?>
                    
                    <label for="electromenager">Electromenager</label>
                </div>
                <div>
                	<?php if($ligne["categorie"]=="vetement"){
                		echo '<input type="radio" id="vetement" name="categorie" value="vetement" checked>';
                	}else{
                		echo '<input type="radio" id="vetement" name="categorie" value="vetement">';
                	}

                	?>
                    
                    <label for="vetement">Vêtement</label>
                </div>
                <div>
                	<?php if($ligne["categorie"]=="figurine"){
                		echo '<input type="radio" id="figurine" name="categorie" value="figurine"checked >';
                	}else{
                		echo '<input type="radio" id="figurine" name="categorie" value="figurine">';
                	}

                	?>
                    
                    <label for="figurine">Figurine</label>
                </div>
                <div>
                	<?php if($ligne["categorie"]=="mobilier"){
                		echo '<input type="radio" id="mobilier" name="categorie" value="mobilier"checked >';
                	}else{
                		echo '<input type="radio" id="mobilier" name="categorie" value="mobilier">';
                	}

                	?>
                    
                    <label for="mobilier">Mobiler</label>
                </div>
                <div>
                	<?php if($ligne["categorie"]=="poster"){
                		echo '<input type="radio" id="poster" name="categorie" value="poster" checked>';

                	}else{
                		echo '<input type="radio" id="poster" name="categorie" value="poster">';
                	}

                	?>
                    
                    <label for="poster">Poster</label>
                </div>
                <h3>Image</h3>
                <?php 
                echo $ligne['img'] ;
                ?>
                <br>
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <label for="image"> Ajouter une image : <input type="file"   name="image" value='.$ligne["img"].'></label><br>
                
               
               
                <div class="bloc">
                    <button type="submit" >Modifier Produit</button>

                </div> 
            </form> 

                <?php 
                echo ' <button type="button" ><a href="supprime_produit.php?id='.$ligne["idArticle"].'">supprimer produit</a></button>';
                    
                     ?>
                
                
                    
                
                  <br>
                  <br>
                  
            </form>
            
        </div>
    </body>
</html>