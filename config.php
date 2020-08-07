<?php
  //Config of db
  $dsn = "mysql:dbname=sistema_de_login;host=localhost";
  $dbuser = "root";
  $dbpass = "";

  try{
      //Connection with db
      $pdo = new PDO($dsn, $dbuser, $dbpass);
} catch(PDOExcepetion $e){
    echo "ERROR: ". $e->getMessage();
    }

?>



