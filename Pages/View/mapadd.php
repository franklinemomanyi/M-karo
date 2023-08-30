
<?php
  require('functions.php');
?>

<?php
$name = $_GET['name'];
$mail = $_GET['mail'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$phone = $_GET['phone'];

$sql = "INSERT INTO MARKERS (NAME,MAIL,LAT,LNG,PHONE)
  VALUES ('$name','$mail','$lat','$lng','$phone')";

if ($conn->query($sql) === TRUE) {

    echo 1;
   
}else{
    echo 2;
  
}
?>
