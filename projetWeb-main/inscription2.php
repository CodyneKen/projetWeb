<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



	 <div class="logo"><strong>NOZAMA</strong> </div> 
	 <a class = "accueil" href="index.php">Accueil</a>
	 <br>
	<br>
	<br>
	<br>
        <form class="co" action="inscription_traitement.php" method="post">
		
                     <div class="login-form">
            <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> inscription réussie !
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe différent
                            </div>
                        <?php
                        break;
                       
                       

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email trop long
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> pseudo trop long
                            </div>
                        <?php 
                          
                        case 'already':
                        ?>
                            <div class="alert alert-danger"> 
                                <strong>Erreur</strong> compte deja existant
                            </div>
                        <?php 

                    }
                }
                ?>
            
            <form action="inscription_traitement.php" method="post">
                <h2 >Inscription</h2>       
                <div class="bloc">
                    <input type="text" name="pseudo"  placeholder="Pseudo" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="text" name="prenom"  placeholder="prenom" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="text" name="nom"  placeholder="nom" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="text" name="mail"  placeholder="adresse-mail" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="text" name="adresse"  placeholder="adresse" required="required" autocomplete="off">
                </div>
               
                <div class="bloc">
                    <input type="password" name="password"  placeholder="Mot de passe" required="required" autocomplete="off">
                </div>
                <div class="bloc">
                    <input type="password" name="password_retype"  placeholder="Verif-mot de passe" required="required" autocomplete="off">
                </div>
                <h3>Cilent ou Vendeur</h3>
                <div class="bloc">
                    <input type="radio" id="client" name="type" value="client">
                    <label for="client">Client</label>
                </div>
                <div class="bloc" >
                    <input type="radio" id="vendeur" name="type" value="vendeur">
                    <label for="vendeur">Vendeur</label>
                </div>
                <div class="bloc">
                    <button type="submit" >Inscription</button>
                </div>   
            </form>
        </div>
                
  
        </div>
</body>
</html>