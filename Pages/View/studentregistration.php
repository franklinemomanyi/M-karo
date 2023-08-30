<?php
require('functions.php');
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
                        <li><a href="href.html">Student Registration Form</a></li>
                        <li>Frankline Momanyi</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Form Inputs</div>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">First name</label>
                                            <input class="form-control" name="fname" id="fname" type="text" placeholder="Student First Name" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="lastName1">Middle name</label>
                                            <input class="form-control" name="mname" id="mname" type="text" placeholder="Student Middle Name" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="lastName1">Last name</label>
                                            <input class="form-control" name="lname" id="lname" type="text" placeholder="Student Last Name" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker1">School</label>
                                            <select class="form-control" name="school" id="school" required="" onchange="fetchselect(this.value);streamselect(this.value)">
                                                <option selected disabled>School</option>
                                                <?php while ($row=mysqli_fetch_array($r)):;?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                                <?php endwhile;?>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="picker1">Class/Level</label>
                                            <select class="form-control" name="class" id="class" required="">
                                                <option selected disabled>Student Class/Grade</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group mb-3">
                                            <label for="picker1">Stream</label>
                                            <select class="form-control" name="stream" id="stream" required="">
                                                <option selected disabled>Class Stream</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="credit1">Admission Number</label>
                                            <input class="form-control" name="admno" id="admno" placeholder="Student Admission Number" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="credit1">Date of Birth</label>
                                            <input class="form-control" name="dob" id="dob" placeholder="Student Date of Birth" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker1">Gender</label>
                                            <select class="form-control" name="sex" id="sex" required="">
                                                <option selected disabled=>Student Gender</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                            </select>
                                        </div>

                                        <div class="col-md-1 form-group mb-3">
                                            <label for="credit1">Title</label>
                                            <select class="form-control" name="ptit" id="ptit" required="">
                                                <option selected disabled>Title</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Prof.">Prof.</option>
                                                <option value="Eng.">Eng.</option>
                                            </select>
                                        </div>

                                        <div class="col-md-5 form-group mb-3">
                                            <label for="credit1">First Name</label>
                                            <input class="form-control" name="pfname" id="pfname" placeholder="Parent's First Name" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="website">Last Name</label>
                                            <input class="form-control" name="plname" id="plname" placeholder="Parent's Last Name" required="" />
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input class="form-control" name="pmail" id="pmail" type="email" placeholder="Parent's Enter email" required="" />
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" name="pphone" id="pphone" placeholder="Enter phone" required="" />
                                            <small id="emailHelp" class="form-text text-muted">Please provide a working Phone Number.</small>
                                        </div>
                                        
                                        <div class="col-md-1 form-group mb-3">
                                            <label for="credit1">Title</label>
                                            <select class="form-control" name="gtit" id="gtit" required="">
                                                <option selected disabled>Title</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Prof.">Prof.</option>
                                                <option value="Eng.">Eng.</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 form-group mb-3">
                                            <label for="picker2">Alternative Parent Name</label>
                                            <input class="form-control" name="gname" id="gname" placeholder="Alternative Guardian name e.g.Mr.James Bond" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker2">Alternative Guardian Phone No.</label>
                                            <input class="form-control" name="gphone" id="gphone" placeholder="Alternative Parent Phone No." required="" />
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
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
    <script type="text/javascript">
        
        function fetchselect(val)
        {
            $.ajax({
                    type: 'post',
                    url: 'dynamicdropdown.php',
                    data: {
                    get_option:val
                    },
                    success: function (response) {
                      document.getElementById("class").innerHTML=response; 
                    }
            });
        }
        function streamselect(val)
        {
            $.ajax({
                    type: 'post',
                    url: 'dynamicdropdown.php',
                    data: {
                    stream:val
                    },
                    success: function (response) {
                      document.getElementById("stream").innerHTML=response;
                    }
            });
        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="../../dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="../../dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../dist-assets/js/scripts/script.min.js"></script>
    <script src="../../dist-assets/js/scripts/sidebar-horizontal.script.js"></script>
</body>


</html>


<?php

if (isset($_POST['submit'])) {
    # code...

    $fname      = mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $mname      = mysqli_real_escape_string($conn, $_REQUEST['mname']);
    $lname      = mysqli_real_escape_string($conn, $_REQUEST['lname']);
    $school     = mysqli_real_escape_string($conn, $_REQUEST['school']);
    $class      = mysqli_real_escape_string($conn, $_REQUEST['class']);    
    $stream     = mysqli_real_escape_string($conn, $_REQUEST['stream']);
    $admno      = mysqli_real_escape_string($conn, $_REQUEST['admno']);
    $account    = $school.$admno;
    $dob        = mysqli_real_escape_string($conn, $_REQUEST['dob']);
    $sex        = mysqli_real_escape_string($conn, $_REQUEST['sex']);
    $ptit       = mysqli_real_escape_string($conn, $_REQUEST['ptit']);
    $pfname     = mysqli_real_escape_string($conn, $_REQUEST['pfname']);
    $plname     = mysqli_real_escape_string($conn, $_REQUEST['plname']);
    $pmail      = mysqli_real_escape_string($conn, $_REQUEST['pmail']);    
    $pphone     = mysqli_real_escape_string($conn, $_REQUEST['pphone']);
    $gtit       = mysqli_real_escape_string($conn, $_REQUEST['gtit']);
    $gname      = mysqli_real_escape_string($conn, $_REQUEST['gname']);
    $gphone     = mysqli_real_escape_string($conn, $_REQUEST['gphone']);



    $sql = "INSERT INTO STUDENTS(FNAME,MNAME,LNAME,SCHOOL,CLASS,STREAM,ADMNO,ACCOUNT,DOB,SEX,PTIT,PFNAME,PLNAME,PEMAIL,PPHONE,ATIT,APNAME,APPHONE)
    VALUES ('$fname','$mname','$lname','$school','$class','$stream','$admno','$account','$dob','$sex','$ptit','$pfname','$plname','$pmail','$pphone','$gtit','$gname','$gphone')";

   

        if ($conn->query($sql) === TRUE) {
            echo '  <script type="text/javascript">
                        swal({
                                title: "M-Karo",
                                text: "Student Successfully Registered",
                                icon: "success",
                                button: "Okay"}).then(function(){
                                   window.location="/MKaro/Pages/View/studentregistration.php";
                                   });
                   
                    </script>';
        } else {
            // code...
            echo '  <script type="text/javascript">
                        swal({
                                title: "M-Karo",
                                text: "Invalid Admission!",
                                icon: "error",
                                button: "Okay"}).then(function(){
                                   window.location="/MKaro/Pages/View/studentregistration.php";
                                   });
                   
                    </script>';
        }
                

} else {
    # code...
}


?>