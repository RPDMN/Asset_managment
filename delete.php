<?php
 include '_dbconnect.php';
 session_start();
 error_reporting(0);
$date = date("Y-m-d H:i:s");
 $recordId = $_POST['recordId'];
 error_log("delete.php : Record ID Received is $recordId");
$query = $pdo->prepare('UPDATE userasset SET returned = 1 , returned_on = now() WHERE id = '.$recordId);
$q1 = $query->execute();
$stmt1 = $pdo->prepare('UPDATE asset_info SET Status = "AVAILABLE"  WHERE asset_id = '.$asset_id);
$q2 = $stmt1->execute();
if($q1){
    echo 'changed';
}

?>
