 <?php $serveur = "localhost";
    $login = 'phpmyadmin';
    $pass = '753951';

    try {
      $connexion = new PDO("mysql:host=$serveur;dbname=phpmyadmin",$login,$pass);
      $connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      


    } catch (PDOException $e) {
      echo 'echec'.$e->getMessage();
    }

  ?>