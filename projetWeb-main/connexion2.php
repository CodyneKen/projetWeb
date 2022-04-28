

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>connexion</title>
	<style type="text/css">
			
	@font-face { 	font-family: "Molot"; 	src: url('molot.ttf'); }
	body {
              background-color:#04212f ;
            }

            .logo {
                width:10%;
                font-family: "Molot";
                font-size: 40px;
                float:center;
                
                position: relative;
                color: whitesmoke;
                margin: 0 auto;
     		width: 100px;
          }
          .co {
          	
          	margin: 0 auto;
     		width: 1000px;
     		height: 1000px;
     		background-color: black;
     		position: relative;
     		align-content: center;
          }
          .bloc{
          	margin: 0 auto;
     		width: 150px;

          }
          h2{
          	font-family: "Molot";
             font-size: 40px;
		color: whitesmoke;
          }
          button {
          	margin: 0 auto;
     		width: 100px;
     		font-family: "Molot";
          	width: 100px;
          	font-size: 40;
          }

          input {
          	font-family: "Molot";
          	font-size: 20px;
		color: #04212f;
          }
          a{
          	font-family: "Molot";
          	color: red;
          	text-decoration: none;
          	position: relative;
          	float: right;
          }


	</style>
</head>
<body>



	 <div class="logo"><strong>NOZAMA</strong> </div> 
	 <a href="inscription2.php">Inscription</a>
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

            
        </div>
</body>
</html>