

<?php
  $server="localhost"; 
  $username="root";
  $dbpassword="";
  $database="user101";
  
  try{
   $dbname = "mysql:host=".$server.";dbname=".$database;
   $pdo = new PDO($dbname,$username,$dbpassword);
   $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
  }catch(PDOexception $e){
   echo "failed" . $e->getMessage(); 
  }
?>