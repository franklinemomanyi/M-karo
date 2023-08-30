<?php
require('functions.php');
require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
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
                        <li><a href="href.html">Batch Student Registration Form</a></li>
                        <li>Frankline Momanyi</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-title mb-3">Form Inputs</div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="picker1">School</label>
                                            <select class="form-control" name="school" id="school" required="" onchange="fetchselect(this.value);streamselect(this.value)">
                                                <option selected disabled>Student School</option>
                                                <?php while ($row=mysqli_fetch_array($r)):;?>
                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                                <?php endwhile;?>
                                                
                                            </select>
                                        </div>

                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker1">Class</label>
                                            <select class="form-control" name="class" id="class" required="">
                                                <option selected disabled>Student Class/Grade</option>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group mb-3">
                                            <label for="picker1">Stream</label>
                                            <select class="form-control" name="stream" id="stream" required="">
                                                <option selected disabled>Class Stream</option>
                                                
                                            </select>
                                        </div>
                                        

                                        <div class="col-md-12 form-group mb-3">
                                            <label for="picker2">File Upload.</label>
                                            <div class="custom-file">
                                                <input class="custom-file-input" name="file" id="file" type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                                                <label class="custom-file-label" for="file" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                                <small class="form-text text-muted">Please provide a Excel document(.xlsx/.xls/.csv).</small>
                                            </div>
                                        </div>

                                        
                                        
                                        
                                        

                                        <div class="col-md-12">
                                            <button class="btn btn-primary" name="submit" id="submit">Submit</button>
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
    <?php
    require('fileinput.php');
    ?>
   
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
    

    $school    = mysqli_real_escape_string($conn, $_REQUEST['school']);
    $class     = mysqli_real_escape_string($conn, $_REQUEST['class']);
    $stream    = mysqli_real_escape_string($conn, $_REQUEST['stream']);

    if (isset($_FILES['file'])) {
        // code...
        $filename  = uniqid().$_FILES['file']['name'];
        $filesize  =$_FILES['file']['size'];
        $filetmp   =$_FILES['file']['tmp_name'];
        $filetype  =$_FILES['file']['type'];
        $location  ="Documents/$filename";


        $objExcel=PHPExcel_IOFactory::load($filetmp);

        foreach ($objExcel->getWorksheetIterator() as $worksheet) {


            $highestrow=$worksheet->getHighestRow();
            for ($row=2; $row <=$highestrow ; $row++) {


                $fname      = $worksheet->getCellByColumnAndRow(0,$row)->getValue();
                $mname      = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
                $lname      = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
                $admno      = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
                $account    = $school.$admno;
                $dob        = $worksheet->getCellByColumnAndRow(4,$row)->getFormattedValue();
                $sex        = $worksheet->getCellByColumnAndRow(5,$row)->getValue();
                $ptit       = $worksheet->getCellByColumnAndRow(6,$row)->getValue();
                $pfname     = $worksheet->getCellByColumnAndRow(7,$row)->getValue();
                $plname     = $worksheet->getCellByColumnAndRow(8,$row)->getValue();
                $pmail      = $worksheet->getCellByColumnAndRow(9,$row)->getValue();
                $pphone     = $worksheet->getCellByColumnAndRow(10,$row)->getValue();
                $gtit       = $worksheet->getCellByColumnAndRow(11,$row)->getValue();
                $gname      = $worksheet->getCellByColumnAndRow(12,$row)->getValue();
                $gphone     = $worksheet->getCellByColumnAndRow(13,$row)->getValue();

                $sql = "INSERT INTO STUDENTS(FNAME,MNAME,LNAME,SCHOOL,CLASS,STREAM,ADMNO,ACCOUNT,DOB,SEX,PTIT,PFNAME,PLNAME,PEMAIL,PPHONE,ATIT,APNAME,APPHONE)
                VALUES ('$fname','$mname','$lname','$school','$class','$stream','$admno','$account','$dob','$sex','$ptit','$pfname','$plname','$pmail','$pphone','$gtit','$gname','$gphone')";

                mysqli_query($conn,$sql);


                if ($row == $highestrow) {
                    // code...
                    move_uploaded_file($filetmp,$location);
                    echo '  <script type="text/javascript">
                                swal({
                                        title: "M-Karo",
                                        text: "Student Batch Successfully Registered",
                                        icon: "success",
                                        button: "Okay"}).then(function(){
                                           window.location="/MKaro/Pages/View/batchregistration.php";
                                           });
                           
                            </script>';
                }
                
            }
        
        
        
        }
    }
    else
    {
        echo '  <script type="text/javascript">
                    swal({
                            title: "M-Karo",
                            text: "XXXXXXXXXXXXXXXXXXXXXX",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/MKaro/Pages/View/batchregistration.php";
                               });
               
                </script>';
    }



}

?>