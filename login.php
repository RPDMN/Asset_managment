
  <?php
  
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $login = false;
    $User_id = $_POST["User_id"];
    $password = $_POST["password"];
    $exist = false ;
 
   
    $sql = "SELECT * FROM user101 WHERE User_id = :User_id ";
    $stmt = $pdo->prepare($sql);
    $pdoQuery_run = $stmt->execute(array(':User_id' => $User_id ));
    $count = $stmt -> fetch();
    if(password_verify($password,$count['password'])){
        $_SESSION['User_id'] =  $User_id;
        $_SESSION['password'] = $password;
        $_SESSION['admin'] = $count['admin'];
     if($_SESSION['admin'] == 'admin'){
        header("location:adminlog.php");
     }else{
        header("location:user.php");
     }
    }else{
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>CREDENIALS</strong>  Donot match.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true' >&times;</span>
        </button>
       </div> ";
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

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="login.php" method="post" >
                                       
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name = 'User_id'
                                                id="User_id" 
                                                placeholder="Enter Staff Id ">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name = 'password'
                                                id="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                               
                                            </div>
                                        </div>
                                        <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                        
                                        <button href='index.html' class="btn btn-primary btn-user btn-block"> Login </button>
                                        <hr>
                                        
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href=register.php>Create an Account!</a>
                                    </div>
                                </div>
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