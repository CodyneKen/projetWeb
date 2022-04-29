<?php

    session_start();
    require_once 'config.php';
    $host = "http://localhost:8000/";

    $id = $_POST['idMembre'];
    $requete = "SELECT * FROM Membres where idMembre = '$id'";
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

            	echo '<form action="modif_compte_traitement.php" method="post">';
            ?>
            
                <h3>Modifier Compte</h3>       
                <div class="bloc">
                	<?php
                		echo "PSEUDO : <input type='text' name='pseudo' value='".$ligne["pseudo"]."' required='required' autocomplete='off'>" ;
                	?>
                    
                </div>
                <br>
            	<br>
                <div class="bloc">
                	<?php
                		echo "ADRESSE : <input type='text' name='adresse' value='".$ligne["adresse"]."' required='required' autocomplete='off'>" ;
                	?>
                    
                </div>
                <br>
            	<br>
                <div class="bloc">
                	<?php
                		echo "ADRESSE MAIL : <input type='text' name='mail' value='".$ligne["mail"]."' required='required' autocomplete='off'>" ;
                	?>
                    
                </div>
                <br>
            	<br>
                <div class="bloc">
                	<?php
                		echo "MOT DE PASSE : <input type='text' name='mdp' value='".$ligne["mdp"]."' required='required' autocomplete='off'>" ;
                	?>
                    
                </div>
                <br>
            	<br>
               
                <div class="bloc">
                	<?php
                   echo '<button type="submit" name="id" value="'.$ligne["idMembre"].'">Modifier compte</button>';
                    ?>
                </div> 
                <br>
            	<br>
            </form> 

                <?php 
				echo '<form action="bannir_traitement.php" method="post">';
                echo '<button type="submit" name="idMembre" value="'.$ligne['idMembre'].'" >supprimer compte</button></a>';
                
            	echo '</form>'; 

               
                    
                     ?>
                
                
                    
                
                  <br>
                  <br>
                  
            </form>
            
        </div>
    </body>
</html>