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
                        <li><a href="href.html">School Registration Form</a></li>
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
                                            <label for="firstName1">School Name</label>
                                            <input class="form-control" name="name" id="name" type="text" placeholder="School Name" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">School Email</label>
                                            <input class="form-control" name="mail" id="mail" type="email" placeholder="School Email" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="lastName1">Phone</label>
                                            <input class="form-control" name="phone" id="phone" type="number" placeholder="Phone" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Website</label>
                                            <input class="form-control" name="web" id="web" type="text" placeholder="Website" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="lastName1">Postal Address</label>
                                            <input class="form-control" name="padd" id="padd" type="number" placeholder="Postal Address" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="lastName1">Postal Code</label>
                                            <input class="form-control" name="pcode" id="pcode" type="number" placeholder="Postal Code" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="firstName1">Location</label>
                                            <input class="form-control" name="loc" id="loc" type="text" placeholder="Location" required="" />
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker1">County</label>
                                            <select class="form-control" name="county" id="county" required="">
                                                <option selected disabled>County</option>
                                                <option value="Mombasa">Mombasa</option>
                                                <option value="Kwale">Kwale</option>
                                                <option value="Kilifi">Kilifi</option>
                                                <option value="Tana River">Tana River</option>
                                                <option value="Lamu">Lamu</option>
                                                <option value="Taita Taveta">Taita Taveta</option>
                                                <option value="Garissa">Garissa</option>
                                                <option value="Wajir">Wajir</option>
                                                <option value="Mandera">Mandera</option>
                                                <option value="Marsabit">Marsabit</option>
                                                <option value="Isiolo">Isiolo</option>
                                                <option value="Meru">Meru</option>
                                                <option value="Tharaka Nithi">Tharaka Nithi</option>
                                                <option value="Embu">Embu</option>
                                                <option value="Kitui">Kitui</option>
                                                <option value="Machakos">Machakos</option>
                                                <option value="Makueni">Makueni</option>
                                                <option value="Nyandarua">Nyandarua</option>
                                                <option value="Nyeri">Nyeri</option>
                                                <option value="Kirinyaga">Kirinyaga</option>
                                                <option value="Murang'a">Murang'a</option>
                                                <option value="Kiambu">Kiambu</option>
                                                <option value="Turkana">Turkana</option>
                                                <option value="West Pokot">West Pokot</option>
                                                <option value="Samburu">Samburu</option>
                                                <option value="Trans Nzoia">Trans Nzoia</option>
                                                <option value="Uasin Gishu">Uasin Gishu</option>
                                                <option value="Elgeyo Marakwet">Elgeyo Marakwet</option>
                                                <option value="Nandi">Nandi</option>
                                                <option value="Baringo">Baringo</option>
                                                <option value="Laikipia">Laikipia</option>
                                                <option value="Nakuru">Nakuru</option>
                                                <option value="Narok">Narok</option>
                                                <option value="Kajiado">Kajiado</option>
                                                <option value="Kericho">Kericho</option>
                                                <option value="Bomet">Bomet</option>
                                                <option value="Kakamega">Kakamega</option>
                                                <option value="Vihiga">Vihiga</option>
                                                <option value="Bungoma">Bungoma</option>
                                                <option value="Busia">Busia</option>
                                                <option value="Siaya">Siaya</option>
                                                <option value="Kisumu">Kisumu</option>
                                                <option value="Homa Bay">Homa Bay</option>
                                                <option value="Migori">Migori</option>
                                                <option value="Kisii">Kisii</option>
                                                <option value="Nyamira">Nyamira</option>
                                                <option value="Nairobi City">Nairobi City</option>
                                            </select>
                                        </div>
                                        

                                        
                                        
                                        
                                        <div class="col-md-12">
                                            <button class="btn btn-primary" type="submit" name="schoolreg" id="schoolreg">Submit</button>
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

if (isset($_POST['schoolreg'])) {
    # code...

    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
    $mail = mysqli_real_escape_string($conn, $_REQUEST['mail']);
    $phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
    $web = mysqli_real_escape_string($conn, $_REQUEST['web']);
    $padd = mysqli_real_escape_string($conn, $_REQUEST['padd']);    
    $pcode = mysqli_real_escape_string($conn, $_REQUEST['pcode']);
    $loc = mysqli_real_escape_string($conn, $_REQUEST['loc']);
    $county = mysqli_real_escape_string($conn, $_REQUEST['county']);

    $sql = "INSERT INTO SCHOOLS(NAME,EMAIL,PHONE,WEBSITE,POSTALADDRESS,POSTALCODE,DIST,COUNTY) 
    VALUES ('$name','$mail','$phone','$web','$padd','$pcode','$loc','$county')";

   

        if ($conn->query($sql) === TRUE) {
            echo '  <script type="text/javascript">
                        swal({
                                title: "M-Karo",
                                text: "School Successfully Registered",
                                icon: "success",
                                button: "Okay"}).then(function(){
                                   window.location="/MKaro/Pages/View/schoolreg.php";
                                   });
                   
                    </script>';
        } else {
            // code...
            echo '  <script type="text/javascript">
                        swal({
                                title: "M-Karo",
                                text: "Email Already used!",
                                icon: "error",
                                button: "Okay"}).then(function(){
                                   window.location="/MKaro/Pages/View/schoolreg.php";
                                   });
                   
                    </script>';
        }
                

} else {
    # code...
}


?>