
<?php
require('functions.php');

	$querry="SELECT * FROM MARKERS";
    $result=mysqli_query($conn,$querry);
    $row=mysqli_fetch_all($result,MYSQLI_ASSOC);

    header('Content-Type: application/json');
    file_put_contents('Mapdata.json', json_encode($row,JSON_PRETTY_PRINT));
    echo json_encode($row,JSON_PRETTY_PRINT);
			
?>