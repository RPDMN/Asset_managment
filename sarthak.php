

<?php

include '_dbconnect.php';
    $sql = "INSERT INTO `userasset` (`user id`,`user name`, `Asset id`, `Asset name`,`Issued Asset`)
     VALUES ('$user_id','$user_name', '$asset_id', '$asset_name','$issued_asset');";
    
    //echo $sql;

    if($con->query($sql) == true){
       echo "Successfully inserted";
    $insert =true;
    }
    else{

        echo "ERROR : $sql <br> $con->error";
    }
    

    $con->close();

?>
<!DOCTYPE html>
<html>
<head>
<body>
  <title>Responsive Table</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/sarthak.css"/>
</head>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting</p>";

        }
    ?>

   <table class="table">
     <thead>
     	<tr>
     	 <th>User id</th>
     	 <th>user name</th>
     	 <th>asset id</th>
     	 <th>asset name</th>
        <th>issued asset</th>
       
     	
     	</tr>
     </thead>
     <tbody>
     	  <tr>
     	  	 
     	  	  <td data-label="User_id"> 
               
             
             <input type="text" name="id" id="id" placeholder="Enter your user id"></td>
     	  	  <td data-label="user_name"><input type="text" name="username" id="username" placeholder="Enter your user name"></td>
     	  	  <td data-label="asset_id"><input type="text" name="asset_id" id="asset_id" placeholder="Enter your asset id"></td>
     	  	  <td data-label="asset_name"><input type="text" name="asset_name" id="asset_name" placeholder="Enter asset name"></td>
             <td data-label="issued_asset"><input type="text" name="issued_asset" id="issued_asset" placeholder="Enter issued asset"></td>
     	  </tr>
         
      </tbody>
    </table>
    <input type="submit" value="Submit">
</body>
</html>

