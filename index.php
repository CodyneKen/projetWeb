<?php

require_once 'config.php';

$id = $_SESSION['user'];
$pseudo = $_SESSION['pseudo'];
$check = $connexion->prepare(" SELECT pseudo, typemembre FROM Membres where idMembre  = '$id' ");
$check->execute(array($pseudo));
$data = $check->fetch();



?>

<!DOCTYPE html>
<html lang = "fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?=$host?>css/style.css">
    <script src="<?=$host?>script.js"></script>
    <title>accueil</title>
</head>

<body>

    

       
        <div id="haut">
        <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div>

        <div class="con">
            
            <?php
            if (!isset($_SESSION['pseudo'])) { 
                ?> <a id="connexion"  href="connexion2.php">connexion/Inscription</a> <a id="panier" href="php/panier/panier.php">  Mon Panier  </a></div> <?php 
            } 
            else { 
                
                ?> <a id="compte" href="compte.php">Bonjour <?php echo $_SESSION['pseudo'] ;?>   </a> <a  href="php/panier/panier.php"> Mon Panier  </a><br><a href="deconnexion.php">deconnexion</a></div> <?php 
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

<div id="superBloc" >
       
       <div class="bloc3">
        
      <div class="bloc3">

      <table>
                        <thead>
                            <tr>
                                <th colspan="4">Meilleures Ventes Electromenager :</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                             
                           


<?php

                
                
                

    $requete = 'SELECT idArticle ,nomArticle, prix,img,nbVentes,categorie FROM Articles WHERE categorie = "electromenager" ORDER BY nbVentes DESC LIMIT 3;';
                        $resultat = $connexion->prepare($requete);
                        $resultat->execute();
                        



         while($ligne = $resultat->fetch()) {

                $image = "photos/".$ligne['img'];
              

                    echo '

                            <tr>
                                <td>'.$ligne['nomArticle'].'</td>
                                <td><img src="'.$image.'" width="50" height="50" alt="'.$ligne['nomArticle'].'"></td>
                               
                                
                                <td>
                                 
            <p class="nouveau_prix">'.$ligne['prix'] ."€".' </p></td>


            <td>
                <form method="GET" action="php/panier/panier_ajout.php" >

                    <button  type="submit" name ="recup_id_art" value="'.$ligne['idArticle'].'">Ajout au panier</button>
                </form>
        

             </td>
                                
                               
                            </tr>


                      

                    ';
                }
               



                      
?>
 </tbody>
                    </table> 

                    </div>
</div>



<div class="bloc3">
        
      <div class="bloc3">

      <table>
                        <thead>
                            <tr>
                                <th colspan="4">Meilleures Ventes Informatique :</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                             
                          

                            <?php
                             $requete = 'SELECT idArticle ,nomArticle, prix,img,nbVentes,categorie FROM Articles WHERE categorie = "informatique" ORDER BY nbVentes DESC LIMIT 3;';
                        $resultat = $connexion->prepare($requete);
                        $resultat->execute();
                        



         while($ligne = $resultat->fetch()) {

                $image = "photos/".$ligne['img'];
              

                    echo '

                            <tr>
                                <td>'.$ligne['nomArticle'].'</td>
                                <td><img src="'.$image.'" width="50" height="50" alt="'.$ligne['nomArticle'].'"></td>
                               
                                
                                <td>
                                 
            <p class="nouveau_prix">'.$ligne['prix'] ."€".' </p></td>


            <td>
                <form method="GET" action="php/panier/panier_ajout.php" >

                    <button  type="submit" name ="recup_id_art" value="'.$ligne['idArticle'].'">Ajout au panier</button>
                </form>
        

             </td>
                                
                               
                            </tr>


                      

                    ';
                }


                            ?>
</tbody>
                    </table> 

                    </div>









    </div>
 </div>

        

        
        <?php
        if (isset($_SESSION['user'])) {
            echo "<button id=\"contacter\" onclick=\"Afficher()\">Nous contacter !</button>";
        } else {
            echo "<div>Pour laisser un commentaire connectez vous s'il vous plait.</div>";
        }
        ?>
        <br>
        <br>
        <?php
        if (isset($data['typemembre']) && $data['typemembre'] == 'vendeur') {
            echo "<a href = http://localhost:8000/ajout_produit.php>Mettre un article en vente</a><br>";
            echo "<a href = http://localhost:8000/mes_ventes.php>Mes Ventes</a>";
        }
        if(isset($data['typemembre']) && $data['typemembre'] == 'admin'){
            echo "<a href = http://localhost:8000/gestion.php>gestion admin</a>";
        }
    ?>
    <br>
<a href=http://localhost:8000/apropos.html>A propos de NOZANA</a>


<footer>
    <form id="form1" action="commentaire.php" method="post">
        <fieldset>
            <legend><strong>Commentaire</strong></legend>
            <label for="message"></label>
            <textarea id="message" name="message" rows="10" cols="86" required="required"></textarea><br>
        </fieldset>
        <button id="enlever" onclick="Enlever()">Masquer formulaire </button>
        <input type="submit" value="Envoyer le message" onclick="verifierDonnees()" />
        <input type="reset" value="Effacer" />
    </form>
</footer>


</body>




</html>
