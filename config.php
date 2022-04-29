 <?php 
    $serveur = "localhost";
    $login = 'root';
    $pass = 'root';

    try {
      $connexion = new PDO("mysql:host=$serveur;dbname=phpmyadmin",$login,$pass);
      $connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo 'echec'.$e->getMessage();
    }

  ?>