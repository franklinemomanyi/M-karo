<?php
require('functions.php');
?>
<!DOCTYPE html>
<html lang="en" dir="">


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <link rel="shortcut icon" href="../../dist-assets/images/logo.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>M-Karo</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="../../dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="../../dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../dist-assets/css/plugins/datatables.min.css" />
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-horizontal-bar">
       
        <!-- header top menu end-->
       <?php
       require('nav.php')
       ?>
        <!-- =============== Horizontal bar End ================-->
        <div class="main-content-wrap d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>M-Karo</h1>
                    <ul>
                        <li>School List</li>
                        <li>Datatables</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
               
                <!-- end of row-->
                <div class="row mb-4">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-body">
                              
                                <div class="table-responsive">
                                    <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>EMAIL</th>
                                                <th>PHONE</th>
                                                <th>WEBSITE</th>
                                                <th>P.O.BOX</th>
                                                <th>LOC</th>
                                                <th>COUNTY</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql        = "SELECT * FROM SCHOOLS";
                                                $result     =mysqli_query($conn,$sql);
                                                while($row  =mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row[0]."</td>";
                                                    echo "<td>".$row[1]."</td>";
                                                    echo "<td>".$row[2]."</td>";
                                                    echo "<td>".$row[3]."</td>";
                                                    echo "<td>".$row[4]."</td>";
                                                    echo "<td>".$row[5]."-".$row[6]."</td>";
                                                    echo "<td>".$row[7]."</td>";
                                                    echo "<td>".$row[8]."</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>EMAIL</th>
                                                <th>PHONE</th>
                                                <th>WEBSITE</th>
                                                <th>P.O.BOX</th>
                                                <th>LOC</th>
                                                <th>COUNTY</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
              
            </div>
            <!-- Footer Start -->
            <!-- <div class="app-footer">
                
                <div class="footer-bottom  pt-3 d-flex flex-column flex-bg-row align-items-center">
                    <div class="d-flex align-items-center">
                        <img class="logo" src="../../dist-assets/images/logo.png" alt="">
                        <div>
                            <p class="m-0">&copy; <?php currentyear();?> Codehub Ltd.</p>
                            <p class="m-0">All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- fotter end -->
        </div>
    </div>
    
    <!-- ============ Search UI End ============= -->
    <script src="../../dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="../../dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../dist-assets/js/scripts/script.min.js"></script>
    <script src="../../dist-assets/js/scripts/sidebar-horizontal.script.js"></script>
    <script src="../../dist-assets/js/plugins/datatables.min.js"></script>
    <script src="../../dist-assets/js/scripts/datatables.script.min.js"></script>
</body>


</html>