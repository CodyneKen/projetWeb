
 <?php

  // Rassemblement des entêtes de tt les fichiers .php
  $host = "http://localhost:8000/";
  
  if (!isset($_SESSION))
  {
    session_start();
  }

  if (!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();

  }


  // Variables de PDO
  $serveur = "localhost";
  $login = 'root';
  $pass = 'lealou43';

  try {
    $connexion = new PDO("mysql:host=$serveur;dbname=phpmyadmin", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo 'echec ' . $e->getMessage();
  }
