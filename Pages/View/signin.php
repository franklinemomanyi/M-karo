<?php
//require('functions.php');
session_start();
$servername = "localhost";
$username = "root";
$password = "onyonka97";
$dbname = "mkaro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

<!DOCTYPE html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>M-Karo</title>
    <link rel="shortcut icon" href="../../dist-assets/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="../../dist-assets/css/themes/lite-purple.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="auth-layout-wrap" style="background-image: url(../../dist-assets/images/photo-wide-4.jpg)">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-4"><img src="../../dist-assets/images/logo.png" alt=""></div>
                        <h1 class="mb-3 text-18">Sign In</h1>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control form-control-rounded" type="email" name="mail" id="mail" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control form-control-rounded" type="password" name="Password" id="Password" required="">
                            </div>
                            <button class="btn btn-rounded btn-primary btn-block mt-2" type="submit" name="submit" id="submit">Sign In</button>
                        </form>
                        <div class="mt-3 text-center"><a class="text-muted" href="forgot.php">
                                <u>Forgot Password?</u></a></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>


</html>

<?php

if (isset($_POST['submit'])) {
    # code...

      $mail = mysqli_real_escape_string($conn,$_POST['mail']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['Password']);     
      $sql = "SELECT * FROM USERS WHERE EMAIL = '$mail'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result);


      if (mysqli_num_rows($result)>0) {
          // code...
        if ($row[9]=='0') {
            // code...
            if (password_verify($mypassword, $row[5])) {
                // code...
                if (!empty($_SESSION['pas'])) {
                    // code...
                    session_destroy();
                }

                $rand = rand();
                $_SESSION['pas'] = $rand;
                $_SESSION['user'] = $mail;
                $_SESSION['fname'] = $row[1];
                $_SESSION['lname'] = $row[2];
                $_SESSION['fullname'] = $row[1]." ".$row[2];
                $_SESSION['rid'] = $row[3];
                $_SESSION['phone'] = $row[6];
                $_SESSION['schoolid'] = $row[7];
                $_SESSION['natid'] = $row[8];
                $welcome = 'Welcome';

                header("Location:index.php");
                //Use this on live server
                //echo "<script>location='index.php'</script>";
                // echo '  <script type="text/javascript">
                //             swal({
                //                         title: "M-Karo",
                //                         text: "'.$welcome.' '.$_SESSION['fullname'].'",
                //                         icon: "success",
                //                         button: "Okay"}).then(function(){
                //                            window.location="/MKaro/Pages/View/index.php";
                //                            });
               
                //         </script>';

            } else {
                // code...
                echo '  <script type="text/javascript">
                            swal({
                                        title: "M-Karo",
                                        text: "Please enter the right Password!",
                                        icon: "error",
                                        button: "Okay"}).then(function(){
                                           window.location="/MKaro/Pages/View/signin.php";
                                           });
               
                        </script>';
            }
            
        } else {
            // code...
            echo '  <script type="text/javascript">
                        swal({
                                    title: "M-Karo",
                                    text: "Please contact your Administrator!",
                                    icon: "error",
                                    button: "Okay"}).then(function(){
                                       window.location="/MKaro/Pages/View/signin.php";
                                       });
               
                    </script>';
        }
        

      } else {
          // code...
            echo '  <script type="text/javascript">
                            swal({
                                        title: "M-Karo",
                                        text: "Account not registered!",
                                        icon: "error",
                                        button: "Okay"}).then(function(){
                                           window.location="/MKaro/Pages/View/signin.php";
                                           });
               
                    </script>';
      }
      

  
    
} else {
    # code...
}


?>