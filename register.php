
<?php
  include '_dbconnect.php';
   error_reporting(0);
 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $User_id = $_POST["User_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rpassword = $_POST["rpassword"];

    //check wether this username exists
    $existsql="SELECT * FROM user101 WHERE User_id = :User_id  ";
    $existstmt = $pdo->prepare($existsql);
    $pdoQuery_run = $existstmt->execute(array(':User_id' => $User_id ));
    $count = $existstmt -> rowCount();
    if(count == 0){
     //connecting to db
      if($password == $rpassword){
      $hash=password_hash($password, PASSWORD_DEFAULT);
       $sql="INSERT INTO user101 (`User_id`, `name`, `email`, `password`, `rpassword`) VALUES (:User_id, :name, :email, :password, :rpassword)";
       
       $stmt = $pdo->prepare($sql);
      
       $pdoQuery_run = $stmt->execute(array(':User_id'=> $User_id , ':name'=> $name ,':email' => $email ,':password'=> $hash,':rpassword'=> $hash));
       if ($pdoQuery_run) {
           
           
           echo '<script> alert("data inserted")</script>';}
    
     }    else{
       echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>ERROR</strong> Password and Confirm password donot match.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' >&times;</span>
        </button>
       </div> ";
       
    }
    }
 }  
 

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="container">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            
                            <form class="user"  action="register.php" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name='User_id' id="User_id"
                                            placeholder="User_id">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name='name' id="name"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name='email' id="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="rpassword"
                                            id="rpassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <!-- <a href="" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </a> -->
                                <button class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>