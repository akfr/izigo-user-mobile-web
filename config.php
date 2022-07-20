<?php
// Informations d'identification
define('DB_SERVER', 'izigo-admin.cznysp3sbdky.us-east-2.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'N5w5CKEM8xL3zK2KePKv8HkbFp6y4sAG');
define('DB_NAME', 'delivery_app_db');
 
// Connexion a la base de donnees MySQL 
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Verifier la connexion
 if($con === false){
  
      die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
  }
 
?>