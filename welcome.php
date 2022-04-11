<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGGEDIN</h1>
    <?php
    include '_dbconnect.php';
    session_start();
         //echo($_SESSION['User_id']);
         $User_id = $_SESSION['User_id'];
         $sql = 'SELECT * FROM user101 where User_id =  "$User_id"';
         $query = $pdo->prepare($sql);
         $q1 = $query->execute();
         echo($_SESSION['User_id']);
         echo($_SESSION['admin']);
      
    ?>
     <a href="http://localhost/BOOT/assetissuedtable.php"> Asset Issued</a>
</body>
</html>