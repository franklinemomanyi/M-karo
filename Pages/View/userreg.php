<?php
require('functions.php');
$q="SELECT ID,NAME FROM SCHOOLS";
$r=mysqli_query($conn,$q);

?>
<!DOCTYPE html>
<html lang="en" dir="">


    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="../../dist-assets/images/logo.png" type="image/x-icon">

    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>M-Karo</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="../../dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="../../dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />


</head>

<body class="text-left">
    <div class="app-admin-wrap layout-horizontal-bar">
       
        <!-- header top menu end-->
       <?php
       require('nav.php');
       ?>
        <!-- =============== Horizontal bar End ================-->
        <div class="main-content-wrap d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>M-Karo</h1>
                    <ul>
                        <li><a href="href.html">User Registration Form</a></li>
                        <li><?php echo $_SESSION['fullname'];   ?></li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Form Inputs</div>
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">First name</label>
                                            <input class="form-control" name="fname" id="fname" type="text" placeholder="First Name" required="" />
                                        </div>
                                        
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="lastName1">Last name</label>
                                            <input class="form-control" name="lname" id="lname" type="text" placeholder="Last Name" required="" />
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker1">School</label>
                                            <select class="form-control" name="school" id="school" required="">
                                                <option selected disabled>School</option>
                                                <?php while ($row=mysqli_fetch_array($r)):;?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                                <?php endwhile;?>
                                                
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="lastName1">ID Number</label>
                                            <input class="form-control" name="id" id="id" type="number" placeholder="ID Number" required="" />
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker1">System Role</label>
                                            <select class="form-control" name="role" id="role" required="">
                                                <option selected disabled>System Role</option>
                                                <option value="0">Administrator</option>
                                                <option value="1">Accountant</option>
                                                
                                            </select>
                                        </div>


                                        <div class="col-md-6 form-group mb-3">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input class="form-control" name="mail" id="mail" type="email" placeholder="Enter email" type="mail" required="" />
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="phone">Password</label>
                                            <input class="form-control" name="password" id="password" placeholder="Password" type="password" required="" />
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" name="phone" id="phone" placeholder="Enter phone" type="number" required="" />
                                        </div>


                                        
                                        
                                        
                                        
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit" name="userreg" id="userreg">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                   
                
                </div><!-- end of main-content -->
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
    </div><!-- ============ Search UI Start ============= -->
   
    <!-- ============ Search UI End ============= -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="../../dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="../../dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../dist-assets/js/scripts/script.min.js"></script>
    <script src="../../dist-assets/js/scripts/sidebar-horizontal.script.js"></script>
</body>


</html>



<?php

if (isset($_POST['userreg'])) {
    # code...

    $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
    $school = mysqli_real_escape_string($conn, $_REQUEST['school']);
    $role = mysqli_real_escape_string($conn, $_REQUEST['role']);
    $mail = mysqli_real_escape_string($conn, $_REQUEST['mail']);
    $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $Npassword = password_hash($password,PASSWORD_DEFAULT);
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);

    $sql = "INSERT INTO USERS(FNAME,LNAME,ROLEID,EMAIL,PASSWORD,PHONE,SCHOOLID,NATID) 
    VALUES ('$fname','$lname','$role','$mail','$Npassword','$phone','$school','$id')";

    $sql1 = "SELECT EMAIL,PHONE,NATID FROM USERS";
    $result = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($result,MYSQLI_NUM);

    if ($row[0]!=$mail) {
        if ($row[1]!=$phone) {
            if ($row[2]!=$id) {
                if ($conn->query($sql) === TRUE) {
                    echo '  <script type="text/javascript">
                                swal({
                                        title: "M-Karo",
                                        text: "User Successfully Registered",
                                        icon: "success",
                                        button: "Okay"}).then(function(){
                                           window.location="/MKaro/Pages/View/userreg.php";
                                           });
                           
                            </script>';
                } else {
                    // code...
                    echo '  <script type="text/javascript">
                                swal({
                                        title: "M-Karo",
                                        text: "Server Error",
                                        icon: "error",
                                        button: "Okay"}).then(function(){
                                           window.location="/MKaro/Pages/View/userreg.php";
                                           });
                           
                            </script>';
                }
                
            } else {

                echo '  <script type="text/javascript">
                            swal({
                                    title: "M-Karo",
                                    text: "ID Number already used!",
                                    icon: "error",
                                    button: "Okay"}).then(function(){
                                       window.location="/MKaro/Pages/View/userreg.php";
                                       });
                       
                        </script>';

            }
            
        } else {

            echo '  <script type="text/javascript">
                        swal({
                                title: "M-Karo",
                                text: "Phone Number already used!",
                                icon: "error",
                                button: "Okay"}).then(function(){
                                   window.location="/MKaro/Pages/View/userreg.php";
                                   });
                   
                    </script>';
        }
        
    } else {

        echo '  <script type="text/javascript">
                    swal({
                            title: "M-Karo",
                            text: "Email already used!",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/MKaro/Pages/View/userreg.php";
                               });
               
                </script>';
    }
    
    
} else {
    # code...
}


?>