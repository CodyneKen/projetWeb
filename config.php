
 <?php

  // Rassemblement des entêtes de tt les fichiers .php
  session_start();
  $host = "http://localhost:8000/";

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
