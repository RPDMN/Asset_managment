<?php
 include '_dbconnect.php';
 session_start();
 error_reporting(0);
$date = date("Y-m-d H:i:s");
 $recordId = $_POST['recordId'];
 error_log("issueback.php : Record ID Received is $recordId");
$query = $pdo->prepare('SELECT userasset.OrderID, user101.name
FROM Orders
INNER JOIN Customers
ON userasset.User_id=user101.User_id');
$q1 = $query->execute();

if($q1){
    echo 'changed';
}

?>
