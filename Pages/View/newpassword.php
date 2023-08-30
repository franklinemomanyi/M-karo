<?php
    #DB CONNECTION
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


    #RECEIVE TOKEN AND EMAIL/VALIDATION
    $token=$_GET['token'];
    $email=$_GET['email'];
    $sql="SELECT * FROM PASSRESET WHERE TOKEN='$token'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
    
    date_default_timezone_set('Africa/Nairobi');
    $time=date('Y-m-d H:i');

    if (mysqli_num_rows($result)==1) {
      if ($time<$row[4]) {
?>

<!DOCTYPE html>


<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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
                        <h1 class="mb-3 text-18">New Password</h1>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">New Password</label>
                                <input class="form-control form-control-rounded" name="Password" id="Password" type="password" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Confirm New Password</label>
                                <input class="form-control form-control-rounded" name="Password1" id="Password1" type="password" required="">
                            </div>
                            <button class="btn btn-primary btn-block btn-rounded mt-3" type="submit" name="submit" id="submit">Submit</button>
                        </form>
                        <div class="mt-3 text-center"><a class="text-muted" href="signin.php">
                                <u>Sign in</u></a></div>
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
}else{
      
      echo '<script type="text/javascript">
                swal({
                            title: "M-Karo",
                            text: "Password Reset link has expired",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/MKaro/Pages/View/forgot.php";
                               });
               
                </script>';

}
} else{
  

    echo '<script type="text/javascript">
                swal({
                            title: "M-Karo",
                            text: "Invalid Token",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/MKaro/Pages/View/forgot.php";
                               });
               
                </script>';

}



if (isset($_POST['submit'])) {
    // code...
    $password = mysqli_real_escape_string($conn, $_REQUEST['Password']);
    $NPassword = password_hash($password,PASSWORD_DEFAULT);
    $password1 = mysqli_real_escape_string($conn, $_REQUEST['Password1']);

    $sql = "UPDATE USERS SET PASSWORD='$NPassword' WHERE EMAIL='$email'";

    if ($password === $password1) {
        // code...
        if (($conn->query($sql)) === TRUE) {
            // code...
            echo '  <script type="text/javascript">
                        swal({
                                title: "M-Karo",
                                text: "Password Successfully Updated",
                                icon: "success",
                                button: "Okay"}).then(function(){
                                   window.location="/MKaro/Pages/View/signin.php";
                                   });
               
                     </script>';
        } else {
            // code...
        }
        
    } else {
        // code...
        echo '  <script type="text/javascript">
                    swal({
                            title: "M-Karo",
                            text: "Passwords dont match!",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/MKaro/Pages/View/forgot.php";
                               });
               
                </script>';
    }
    
}

?>