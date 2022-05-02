<?php

require_once 'config.php';

$id = $_SESSION['user'];
$pseudo = $_SESSION['pseudo'];
$check = $connexion->prepare(" SELECT pseudo, typemembre FROM Membres where idMembre  = '$id' ");
$check->execute(array($pseudo));
$data = $check->fetch();



?>

<!DOCTYPE html>
<html>

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
                ?> <a id="panier"  href="connexion2.php">connexion</a> <a id="panier" href="php/panier/panier.php">Mon Panier</a></div> <?php 
            } 
            else { 
                
                ?> <a id="panier" href="compte.php">Bonjour <?php echo $_SESSION['pseudo'] ;?>   </a> <a id="panier" href="php/panier/panier.php"> &nbsp  Mon Panier</a></div> <?php 
            }
            ?>
            
        </div>

            <form class="barre" method="GET" action="recherche_membres.php">
              
                <input id="searchbar" type="search" name="search" placeholder="recherche">

               
            </form>

    
        <br>
        <br>
        <br>
        
        <div id="categories">
            Categories :
            <a class="c" href=http://localhost:8000/categ.php?categorie=informatique>Informatique</a>
            <a class="c" href=http://localhost:8000/categ.php?categorie=electromenager>Electromenager</a>
            <a class="c" href=http://localhost:8000/categ.php?categorie=figurine>Figurines</a>
            <a class="c" href=http://localhost:8000/categ.php?categorie=vetements>Vetements</a>
            <a class="c" href=http://localhost:8000/categ.php?categorie=mobilier>Mobilier</a>
            <a class="c" href=http://localhost:8000/categ.php?categorie=poster>Poster</a>
        </div>

 <!--
        <div id="promo">
            <h2>Promotions</h2>
            <h3>ROG Zephyrus M16 GU603HE avec NVIDIA GeForce RTX 3050 Ti</h3>
            <img src="photos/pc_asus.webp" class='image' alt="PC gamer asus" /><br>
            <p class='ancien_prix'>1799,99 € </p>
            <p class='nouveau_prix'>1499,99 €</p>
            Économisez 300,00 € <br>
            <h3>Table salle à manger bois massif pied mikado 240 cm MELBOURNE</h3>
            <img src="photos/table_bois.jpg" class='image' alt="table bois" /><br>
            <p class='ancien_prix'>1349,00 € </p>
            <p class='nouveau_prix'>1199,99 €</p>
            Économisez 149,01 € <br>
            <h3>Réfrigérateur Américain LG GSXV90MCAE INSTAVIEW </h3>
            
            <p class='ancien_prix'>2999, 00 € </p>
            <p class='nouveau_prix'>1999,00 €</p>
            Économisez 1000 € <br>

            
        </div>
    -->

<br>

<div id="superBloc" >
       
       <div class="bloc3">
        
      <div class="bloc3">

      <table>
                        <thead>
                            <tr>
                                <th colspan="5">Meilleures Ventes Electromenager :</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                             
                            <tr>

                               
                               

                                
                            </tr>


<?php
function promo(){

     echo '<div class="bloc2">

      <table>
                        <thead>
                            <tr>
                                <th colspan="5">Promotions Ordinateurs :</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                             
                            <tr>

                               
                               

                                
                            </tr>

                            <tr>
                                <td>ROG Zephyrus M16 GU603HE</td>
                                <td><img src="photos/pc_asus.webp" class="image" alt="PC gamer asus" /></td>
                               
                                
                                <td></td>

                                 <td><p class="ancien_prix">2999, 00 € </p>
            <p class="nouveau_prix">1999,00 €</p></td>


            <td>
                <form method="GET" action="php/panier/panier_ajout.php" >

                    <button id="ajouter" type="submit" name ="recup_id_art" value="5">Ajout au panier</button>
                </form>
        

             </td>
                                
                               
                            </tr>
<tr>
                                <td>ROG Zephyrus M16 GU603HE</td>
                                <td><img src="photos/pc_asus.webp" class="image" alt="PC gamer asus" /></td>
                               
                                
                                <td></td>

                                 <td><p class="ancien_prix">2999, 00 € </p>
            <p class="nouveau_prix">1999,00 €</p></td>




            <td>
                <form method="GET" action="php/panier/panier_ajout.php" >

                    <button id="ajouter" type="submit" name ="recup_id_art" value="5">Ajout au panier</button>
                </form>
        

             </td>
                                
                               
                            </tr>

                            <tr>

                             <td>ROG Zephyrus M16 GU603HE</td>
                                <td><img src="photos/pc_asus.webp" class="image" alt="PC gamer asus" /></td>
                               
                                
                                <td></td>

                                 <td><p class="ancien_prix">2999, 00 € </p>
            <p class="nouveau_prix">1999,00 €</p></td>




            <td>
                <form method="GET" action="php/panier/panier_ajout.php" >

                    <button id="ajouter" type="submit" name ="recup_id_art" value="5">Ajout au panier</button>
                </form>
        

             </td>


                            </tr>

 <td>ROG Zephyrus M16 GU603HE</td>
                                <td><img src="photos/pc_asus.webp" class="image" alt="PC gamer asus" /></td>
                               
                                
                                <td></td>

                                 <td><p class="ancien_prix">2999, 00 € </p>
            <p class="nouveau_prix">1999,00 €</p></td>




            <td>
                <form method="GET" action="php/panier/panier_ajout.php" >

                    <button id="ajouter" type="submit" name ="recup_id_art" value="5">Ajout au panier</button>
                </form>
        

             </td>

                        </tbody>
                    </table> 

                    </div>

                    ';
                }
                
                

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

                    <button id="ajouter" type="submit" name ="recup_id_art" value="'.$ligne['idArticle'].'">Ajout au panier</button>
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

<?php 
    promo();
    
    
?>

<div class="bloc3">
        
      <div class="bloc3">

      <table>
                        <thead>
                            <tr>
                                <th colspan="5">Meilleures Ventes Informatique :</th>
                            </tr>
                        </thead>

                        <tbody>
                        
                             
                            <tr>

                               
                               

                                
                            </tr>

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

                    <button id="ajouter" type="submit" name ="recup_id_art" value="'.$ligne['idArticle'].'">Ajout au panier</button>
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

<?php 
    promo();
    
    
?>







    </div>
 </div>

        

<?php
/*
                    $id = $_SESSION['user'];

                        $requete = 'SELECT nomArticle, prix, qteArticle, dateCommande,img,idClient FROM Commandes, Articles WHERE Commandes.idArticle = Articles.idArticle AND idClient = '.$id.' ORDER BY dateCommande;';
                        $resultat = $connexion->prepare($requete);
                        $resultat->execute();
                        



         while($ligne = $resultat->fetch()) {

                $image = "photos/".$ligne['img'];
                             echo '     <table>
                        <thead>
                            <tr>
                                <th colspan="4">Commande du : '.$ligne['dateCommande'].'</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>

                                <td></td>
                                <td>Nom article</td>
                                 <td>Prix</td>
                                 <td></td>
                                <td>Quantite</td>
                            </tr>
                            <tr>

                                <td><img src="'.$image.'" width="50" height="50" alt="'.$ligne['nomArticle'].'"></td>
                                <td>'.$ligne['nomArticle'].'</td>
                                 <td>'.$ligne['prix'] * $ligne['qteArticle']."€".'</td>
                                 <td></td>
                                <td>'.$ligne['qteArticle'].'</td>
                            </tr>
                        </tbody>
                    </table> ';
                    echo "<br>";
                    echo "<br>";





                    }  
           */

                    ?>
<!-- 

        <div id="meilleures_ventes">
            <h2>Meilleures Ventes</h2>
            <h3>Réfrigérateur Américain LG GSXV90MCAE INSTAVIEW </h3>
            <img src="photos/frigo1.jpeg" class='image' alt="frigo" /><br>
            <p class='ancien_prix'>2999, 00 € </p>
            <p class='nouveau_prix'>1999,00 €</p>
            Économisez 1000 € <br>
            <h3>Table salle à manger bois massif pied mikado 240 cm MELBOURNE</h3>
            <img src="photos/table_bois.jpg" class='image' alt="table bois" /><br>
            <p class='ancien_prix'>1349,00 € </p>
            <p class='nouveau_prix'>1199,99 €</p>
            Économisez 149,01 € <br>
        </div>
        
        <div id="promo2"  >
            fdfdfdfd

        </div>
        <br>
-->

        
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
            echo "<a href = http://localhost:8000/ajout_produit.php>Mettre un article en vente</a>";
        }
        if(isset($data['typemembre']) && $data['typemembre'] == 'admin'){
            echo "<a href = http://localhost:8000/gestion.php>gestion admin</a>";
        }
    ?>
    <br>
<a href=http://localhost:8000/apropos.html>A propos de NOZANA</a>





</body>
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
