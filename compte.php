<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>compte</title>
</head>
<style type="text/css">
	
@font-face { 	font-family: "Molot"; 	src: url('molot.ttf'); }




.haut {
width:100%;

align-content: space-between;

}

#compte {
	
	background-color: gray;

}

 input {
          	font-family: "Molot";
          	font-size: 20px;
		color: #04212f;
          }
.barre {
	
          	
width:80%;

float:left;
align-content: space-between;
position: relative;
}

.logo {
	width:10%;
	font-family: "Molot";
	font-size: 40px;
	float:left;
	align-content: space-between;
	position: relative;
	color: whitesmoke;
}

#con {
font-family: "serif";

color : whitesmoke;
text-decoration: none;
}

#panier {
	font-family: "serif";
	
color : whitesmoke;
text-decoration: none;

}
.co {
width:10%;
font-family: "serif";
color : red;
float:left;
align-content: space-between;
position: relative;
}

#categories{
	font-size: 30px;
	background-color: whitesmoke;
	font-family: "Molot";
	color: #04212f;
	align-content: space-between;
}


#categories a:link:hover{
    border: solid 1px black;
}

.c {
	color: #04212f;
	text-decoration: none;

}

input::placeholder {
	color: #04212f;
	font-family: "Molot";
	font-size: large;
}

input {
	width: 1200px;
    height: 30px;
}



body{
	background-color: #04212f;

}
.compte{
	color: #04212f;
	font-family: "Molot";
	
	
	background-color: dimgray;
}

#bloc {
	width:100%;
	
	align-content: space-between;
}

.mes_infos{
	float:left;
	font-family: "Molot";
	color: whitesmoke;
	align-content: space-between;
	width:50%;
	background-color: dimgray;
}

.mes_commandes{
	background-color: dimgray;
	float:left;
	font-family: "Molot";
	color: whitesmoke;
	align-content: space-between;
	width:50%;
}

.accueil{
	font-size: 30px;
	font-family: "Molot";
	color: whitesmoke;
}

</style>
<body>



<div class="haut">
	 <div class="logo"><strong>NOZAMA</strong> </div>   
	 <div class="barre"><input id="searchbar"  type="text"
        name="search" placeholder="recherche">  </div> 
<div class="co">
		<?php

session_start();
require_once 'config.php';
	if(!isset($_SESSION['user']))
	{
		echo "<a id=\"con\" href=\"connexion2.php\">connexion</a> <a id=\"panier\" href=\"panier.php\">Mon Panier</a> <a id=\"deco\" href=\"deconnexion.php\">deconnexion</a></div>";
	}
	else{
		echo "<a id=\"con\" href=\"index.php\">{$_SESSION['user']}</a> <a id=\"panier\" href=\"panier.php\">Mon Panier</a></div><a id=\"deco\" href=\"deconnexion.php\">deconnexion</a></div> ";
	}

		?>
		
	</div>
	<br>
	<br>
	<br>
	<div id = "categories">
        Categories :
        <a class ="c" href = http://localhost:8000/informatique.php>Informatique</a>
        <a class ="c" href = http://localhost:8000/electromenager.php>Electromenager</a>
        <a class ="c"  href = http://localhost:8000/figurine.php>figurine</a>
        <a class ="c" href = http://localhost:8000/vetements.php>Vetements</a>
        <a class ="c" href = http://localhost:8000/mobilier.php>Mobilier</a>
        <a class ="c" href = http://localhost:8000/poster.php>Poster</a>
    </div>
	<br>
	<br>
	<br>
        

<div class="compte">
        	Votre Compte
        	<br>
        	<br>
        	<div id="bloc">

        		<div class="mes_infos">Mes informations:
        			<br>
        			<?php
        				require_once 'config.php';
						$pseudo = $_SESSION['user'] ;
						
						$check = $connexion->prepare("SELECT  pseudo,prenom,nom,mail,adresse,mdp FROM Membres where pseudo  = '$pseudo' ");
					    $check->execute(array($pseudo));
					    $data = $check->fetch();
					    
					    echo " pseudo : {$data['pseudo']}
					    		<br> NOM : {$data['nom']}
					    	  <br> PRENOM : {$data['prenom']}
					    	  <br> ADRESSE : {$data['adresse']}
					    	  <br> MAIL : {$data['mail']} " ;

        			?>
        			<br>
					<a class = "accueil" href = http://localhost:8000/index.php>Accueil</a>
        		</div>
        		<div class="mes_commandes">Mes commandes:        			
        		</div>

        </div>
        	
        	
        </div>
</body>
</html>