 <?php

  // Rassemblement des entêtes de tt les fichiers .php
  $host = "http://localhost:8000/";

  
// si pas de session on la lance
  if (!isset($_SESSION)){
    session_start();
  }

// si pas de panier on en créé un
  if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }

  // fonctions utiles :
  function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function alert_js($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}


  // Variables de PDO
  $serveur = "localhost";
  $login = 'phpmyadmin';
  $pass = '753951';

  try {
    $connexion = new PDO("mysql:host=$serveur;dbname=phpmyadmin", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo 'echec ' . $e->getMessage();
  }

  ?>
