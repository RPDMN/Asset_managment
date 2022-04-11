<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminlog.php">
                <div class="sidebar-brand-text mx-3">Admin <sup>Panel</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
           

                  
           
            <li class="nav-item">
                 <a class="nav-link " href="add_asset.php"  
                    >
                    
                    <span>Add Asset</span>
                </a>
                
            </li>
           
            <li class="nav-item">
                 <a class="nav-link " href="issueasset.php"  
                    >
                    
                    <span>Issue Asset</span>
                </a>
                
            </li>

            <li class="nav-item">
                 <a class="nav-link " href="assetavailtable.php"  
                    >
                    
                    <span>Asset Available</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link" href="assetissuedtable.php"  
                    >
                    
                    <span>Asset Issued</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link " href="assetreturnadmin.php"  
                    >
                    
                    <span>Asset History</span>
                </a>
                
            </li>
           
           
             <!-- Divider  -->
            <hr class="sidebar-divider">

             <!-- Sidebar Toggler (Sidebar)  -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar  -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                           
                        </li>

                       
                        <!-- Nav Item - Messages -->
                        
                            <!-- Dropdown - Messages -->
                           

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?phpecho '$_SESSION['User_id']' ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">     
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="C:\xampp\htdocs\boot\login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                
            <!-- End of Main Content -->
           <div class='container-fluid'>
           <div class='container'>
            <?php
            include '_dbconnect.php';
            $smt = $pdo->prepare('SELECT * From user101');
            $smt->execute();
            $userList = $smt->fetchAll();

            
            $smt1 = $pdo->prepare('SELECT * From asset_info WHERE Status="AVAILABLE"');
            $smt1->execute();
            $assetList = $smt1->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    $User_id = (isset($_POST['User_id']) ? $_POST['User_id'] : '');
    $asset_id = (isset($_POST['asset_id']) ? $_POST['asset_id'] : '');
    $issued_on = (isset($_POST['issued_on']) ? $_POST['issued_on'] : '');
    //  echo($issued_on);
    $sql = "INSERT INTO userasset (User_id,asset_id, issued_on) VALUES (:User_id,:asset_id,:issued_on)";
    $stmt = $pdo->prepare($sql);
    $pdoQuery_run = $stmt->execute(array(':User_id' => $User_id, ':asset_id' => $asset_id, ':issued_on' => $issued_on));
   
    $stmt1 = $pdo->prepare('UPDATE asset_info SET Status = "NOT AVAILABLE"  WHERE asset_id = '.$asset_id);
    $q1 = $stmt1->execute();
    

}
         ?>

           
           <!DOCTYPE html>
           <html lang="en">
           <head>
               <meta charset="UTF-8">
               <meta http-equiv="X-UA-Compatible" content="IE=edge">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" href="css/add_asset.css">
               <!-- <link rel="stylesheet" href="css/date.css"> -->
               <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
               <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
               <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
               <title>add_asset</title>
           </head>
           <body>
               <div class="container contact">
                   <div class="row">
                       <div class="col-md-3">
                           <div class="contact-info">
                               <img src="img/cdot_logo.png" alt="image" width='125' id=img_cdot/>
                              
                           </div>
                       </div>
                       <div class="col-md-9">
                         <form class="user"  action="issueasset.php" method="post">
                           <div class="contact-form">
                               <div class="form-group">
                                 <label class="control-label col-sm-2" for="User_id">User Id:</label>
                                 <div class="col-sm-10">          
                                 <select name="User_id" id="User_id">
                                   <?php 
                                   foreach ($userList as $userRow){?>
                                       <option value="<?php echo $userRow['User_id']?>"><?php echo $userRow['name']."-".$userRow['User_id']?></option>
                                   <?php } ?>
                                   </select>
                                  
                                 </div>
                              </div>  
                               <div class="form-group">
                                 <label class="control-label col-sm-2" for="asset_id">Asset Id:</label>
                                 <div class="col-sm-10">          
                                 <select name="asset_id" id="asset_id">
                                   <?php foreach ($assetList as $assetRow){?>
                                       <option value="<?php echo $assetRow['asset_id']?>"> <?php echo $assetRow['asset_Name']."-".$assetRow['asset_id']?></option>
                                   <?php } ?>
                                   </select>
                                </div>
                               </div>

                               
                               <div class="form-group">
                                 <label class="control-label col-sm-2" id="issued_on"for="issued_on">Issued On:</label>
                                 <div class="col-sm-10">          
                                 <input type='date' class='center' name="issued_on"   width='100' required="required">
                                 </div>
                               </div>
 
                               <div class="form-group">        
                                 <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-default">Submit</button>
                                 </div>
                               </div>
                           </div>
                         </form>
                       </div>
                     
                   </div>
                  
               
           </body>
           </html>
           
           </div>
                      
                      </div>
                       
           
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded " href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>