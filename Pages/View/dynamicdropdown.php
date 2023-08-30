
<?php
require('functions.php');

if(isset($_POST['get_option']))
    {
         

        $school     = $_POST['get_option'];
        $sql        = "SELECT * FROM CLASSES WHERE SCHOOLID = '$school'";
        $result     =mysqli_query($conn,$sql);
        while($row  =mysqli_fetch_array($result))
        {
            echo "<option value=".$row[0].">".$row[2]." ".$row[3]."</option>";
        }
        exit;
    }

if(isset($_POST['stream']))
    {
         

        $school     = $_POST['stream'];
        $sql        = "SELECT * FROM STREAMS WHERE SCHOOLID = '$school'";
        $result     =mysqli_query($conn,$sql);
        while($row  =mysqli_fetch_array($result))
        {
            echo "<option value=".$row[0].">".$row[2]."</option>";
        }
        exit;
    }


?>

  