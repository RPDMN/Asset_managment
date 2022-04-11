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
                <div class="container-fluid">

                <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/assetavailtable.css"> -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>add_asset</title>
</head>
<body>
   
              
              <table class="table table-dark table-striped table-hover table-bordered" id='table'>
              <thead>
                 <th colspan="8" class="text-center"><h1>Asset Return</h1></th> 
                <tr >
                  <th scope="col">User_Id</th>
                  <th scope="col">User_Name</th>
                  <th scope="col">Asset_Name</th>
                  <th scope="col">Asset_Id</th>
                  <th scope="col">Issued_on</th>
                  <th scope="col">Returned_On</th>
                  <th>Returned</th>
                  <!-- <th scope="col" >Action</th> -->
                </tr>
             </thead>
                 <tbody>
                 <?php
                  include '_dbconnect.php';
                //   $query_assetList = $pdo->prepare('SELECT * FROM `userasset` WHERE returned = 1 ');
                //   $query_assetList->execute();
                //   $result = $query_assetList->fetchAll();
                $sql = "SELECT userasset.id,userasset.User_id,user101.name,asset_info.asset_Name,asset_info.asset_id,userasset.issued_on,userasset.returned_on,userasset.returned from user101,asset_info,userasset WHERE user101.User_id = userasset.User_id AND asset_info.asset_id = userasset.asset_id AND userasset.returned=1;";
                $query_assetList = $pdo->prepare($sql);
                $query_assetList->execute();
                 $result = $query_assetList->fetchAll(PDO::FETCH_ASSOC);
                  foreach($result as $row )
                  {
                   
                       ?> 
                        <tr> 
                        <td><?php echo $row['User_id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['asset_Name'] ?></td>
                        <td><?php echo $row['asset_id'] ?></td>
                        <td><?php echo $row['issued_on'] ?></td>
                        <td><?php echo $row['returned_on'] ?></td>
                        <td><?php echo $row['returned'] ?></td>
                        <!-- <td>
                             
                            <button id='return' class="btn  bg-light text-danger">Return</button>
                        </td> -->
                        </tr>        
                      
                  <?php  }  
                 ?>
                  </tbody>
                  </table>
     
            
</body>
</html>



            </div>
            <!-- End of Main Content -->
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
