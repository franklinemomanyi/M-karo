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
                        <h1 class="mb-3 text-18">Forgot Password</h1>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input class="form-control form-control-rounded" name="mail" id="mail" type="email" required="">
                            </div>
                            <button class="btn btn-primary btn-block btn-rounded mt-3" type="submit" name="submit" id="submit">Reset Password</button>
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
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn,$_POST['mail']);
    $sql="SELECT * FROM USERS WHERE EMAIL = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_NUM);



    if (mysqli_num_rows($result)==1) {

        #Time insertion
        date_default_timezone_set('Africa/Nairobi');
        $crttime = date('Y-m-d H:i');
        $exptime = date('Y-m-d H:i',strtotime('+1 hour',strtotime($crttime)));
        $rand = mt_rand(100000,999999);
        $sql1="INSERT INTO PASSRESET(EMAIL,TOKEN,CRTDATE,EXPDATE) VALUES('$email','$rand','$crttime','$exptime')";


        #TOKEN
        require 'PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;                                 
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com ';                      
        $mail->SMTPAuth = true;                               
        $mail->Username = 'revcollsystem@gmail.com';          
        $mail->Password = 'moi.1984';                         
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                    
        $mail->setFrom('revcollsystem@gmail.com', $row[1].' '.$row[2]);
        $mail->addAddress($_POST['mail']);
        $mail->addReplyTo('revcollsystem@gmail.com');
        

        //$mail->addAttachment('/var/tmp/file.tar.gz');       
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');  
        $mail->isHTML(true);                                  
        $mail->Subject = 'Password Reset:';
        $mail->Body    = 
        '<p style="font-family:papyrus;font-size: 14px;">Hello <b>'.$row[1].' '.$row[2].',</b><br/><br/>'.
        'Please click on the button below to reset your password.<br/>
        
        N/B: 
        This Link is only <b>valid for one hour</b>.<br/>
        <a href="http://127.0.0.1/MKaro/Pages/View/newpassword.php?token='.$rand.'&& email='.$email.'"><button type="button" style="font-family:papyrus;"><b>Reset Password</b></button></a><br/><br/>
        Regards,<br/>
        <b>M-Karo Team.</b><br/></p>';
        $mail->AltBody = '/MKaro/Pages/View/forgot.php';


        if ($mail->send()) {
            // code...
            if (mysqli_query($conn,$sql1)) {
                // code...
                echo '<script type="text/javascript">
                swal({
                            title: "M-Karo",
                            text: "A Password Reset link has been sent to your email",
                            icon: "success",
                            button: "Okay"}).then(function(){
                               window.location="/MKaro/Pages/View/forgot.php";
                               });
               
                </script>';
            } else {
                echo '  <script type="text/javascript">
                        swal({
                                    title: "M-Karo",
                                    text: "Querry Error!",
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
                                    text: "Mail Error!",
                                    icon: "error",
                                    button: "Okay"}).then(function(){
                                       window.location="/MKaro/Pages/View/forgot.php";
                                       });
               
                    </script>';
        }
        
        
       
        
    } else {
        // code...
        echo '  <script type="text/javascript">
                    swal({
                            title: "M-Karo",
                            text: "Please enter a valid email adress!",
                            icon: "error",
                            button: "Okay"}).then(function(){
                               window.location="/MKaro/Pages/View/forgot.php";
                               });
               
                </script>';
    }
        
}