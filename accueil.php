<!DOCTYPE html>
<html lang = "fr"> 
  <head>
        <meta charset="utf-8" />
        <title>NOZANA</title>
        <link rel = "stylesheet" href="projet.css">
        <script src="script.js"></script>
    </head> 
    <body> 
        <h1>NOZAMA</h1>
        <?php
            if ($_POST['pseudo']!=""){
                echo "<a href = http://localhost:8000/compte.php>Mon compte</a>";
                echo "<a href = http://localhost:8000/panier.php>Panier</a>";
            }
            else{
                echo "<a id = 'connexion' href = http://localhost:8000/connexion.php>Connexion</a>";
            }
        ?>
        <div id = "categories">
        Catégories :
        <a href = http://localhost:8000/informatique.php>Informatique</a>
        <a href = http://localhost:8000/electromenager.php>Electromenager</a>
        <a href = http://localhost:8000/figurine.php>figurine</a>
        <a href = http://localhost:8000/vetements.php>Vêtements</a>
        <a href = http://localhost:8000/mobilier.php>Mobilier</a>
        <a href = http://localhost:8000/poster.php>Poster</a>
        </div>
        <br>
        <div id = "promo">
            <h2>Promotions</h2>
            <h3>ROG Zephyrus M16 GU603HE avec NVIDIA GeForce RTX 3050 Ti</h3>
            <img src="photos/pc_asus.webp" class='image' alt="PC gamer asus"/><br>
            <p class='ancien_prix'>1799,99 € </p>
            <p class = 'nouveau_prix'>1499,99 €</p>
            Économisez 300,00 € <br>
            <h3>Table salle à manger bois massif pied mikado 240 cm MELBOURNE</h3>
            <img src="photos/table_bois.jpg" class='image' alt="table bois" /><br>
            <p class='ancien_prix'>1349,00 € </p>
            <p class = 'nouveau_prix'>1199,99 €</p>
            Économisez 149,01 € <br>
            <h3>Réfrigérateur Américain LG GSXV90MCAE INSTAVIEW </h3>
            <img src="photos/frigo1.jpeg" class='image' alt="frigo" /><br>
            <p class='ancien_prix'>2999, 00 € </p>
            <p class = 'nouveau_prix'>1999,00 €</p>
            Économisez 1000 € <br>
        </div>
        <div id = "meilleures_ventes">
            <h2>Meilleures Ventes</h2>
            <h3>Réfrigérateur Américain LG GSXV90MCAE INSTAVIEW </h3>
            <img src="photos/frigo1.jpeg" class='image' alt="frigo" /><br>
            <p class='ancien_prix'>2999, 00 € </p>
            <p class = 'nouveau_prix'>1999,00 €</p>
            Économisez 1000 € <br>
            <h3>Table salle à manger bois massif pied mikado 240 cm MELBOURNE</h3>
            <img src="photos/table_bois.jpg" class='image' alt="table bois" /><br>
            <p class='ancien_prix'>1349,00 € </p>
            <p class = 'nouveau_prix'>1199,99 €</p>
            Économisez 149,01 € <br>
        </div>
        <br>
        <a href = http://localhost:8000/apropos.html>A propos de NOZANA</a>
        <button id="contacter" onclick="Afficher()">Nous contacter !</button>
        <br>
        <br>
        </body>
        <footer>
        <form id="form1" onsubmit="return verifierDonnees()" novalidate="novalidate">
            <fieldset>
            <legend><strong>Commentaire</strong></legend>
            <label for="nom">Nom</label><input type="text" id="nom" required />
            <label for="email">Adresse email</label><input type="email" id="email" required /><br>
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="10" cols="86" required="required"></textarea><br>
            Nous acceptons seulement les commentaires de plus de 50 caractères.
            </fieldset>  
            <button id="enlever" onclick="Enlever()">Masquer formulaire </button>
            <input type="submit" value="Envoyer le message" onclick="verifierDonnees()" />
            <input type="reset" value="Effacer" />      
         </form>  
    </footer>
</html>