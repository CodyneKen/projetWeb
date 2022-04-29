<?php

session_start();
require_once 'config.php';
$host = "http://localhost:8000/";


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>connexion</title>
	<link rel="stylesheet" type="text/css" href="<?=$host?>css/connexion.css">
	<script src="<?=$host?>script.js"></script>
</head>
<body>
	 <div class="logo" onclick="goHomepage()"><strong>NOZAMA</strong> </div> 
	 <br>
	 <br>
	 <br>
	 <br>
	 <form  class="co" action="connexion_php.php" method="post">         
		 <div class="bloc">
			 <h2 >Connexion</h2> 
			 <input  name="pseudo"  placeholder="pseudo" required="required" autocomplete="off">
			</div>
			<br>
			<br>
			<div class="bloc">
				<input type="password" name="password"  placeholder="Mot de passe" required="required" autocomplete="off">
			</div>
			<br>
			<br>
			<div class="bloc">
				<button type="submit" >Connexion</button>
			</div> 
			<br>
			<br>
			
		</form>
		<div class= "ins">
			Vous n'etes pas inscrit(e), alors insrivez vous !<br>
			<a href="inscription2.php">Inscription</a>
		</div>
		
            
        </div>
</body>
</html>