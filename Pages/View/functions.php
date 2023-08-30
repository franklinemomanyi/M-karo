<?php

session_start();


$servername = "localhost";
$username = "root";
$password = "onyonka97";
$dbname = "mkaro";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$q="SELECT ID,NAME FROM SCHOOLS";
$r=mysqli_query($conn,$q);

if (!$_SESSION['pas']) {
header("Location: /MKaro/Pages/View/signin.php");
}else{
}

function currentyear()
{
	$year = date("Y");
	echo $year;
}

function getgender($gix)
{
	$g;
	if ($gix == 0) {
		$g = 'Male';
		return $g;
	} else {
		$g = 'Female';
		return $g;
	}
}

function getschoolname($name)
{
	global $conn;
	$q="SELECT ID,NAME FROM SCHOOLS WHERE ID='$name'";
	$r=mysqli_query($conn,$q);
	$row = mysqli_fetch_array($r);
	return $row[1];
}

function getclassname($name)
{
	global $conn;
	$q="SELECT ID,NAME,LEVEL FROM CLASSES WHERE ID='$name'";
	$r=mysqli_query($conn,$q);
	$row = mysqli_fetch_array($r);
	return $row[1]." ".$row[2];
}

function getstreamname($name)
{
	global $conn;
	$q="SELECT NAME FROM STREAMS WHERE ID='$name'";
	$r=mysqli_query($conn,$q);
	$row = mysqli_fetch_array($r);
	return $row[0];
}

function getstatus($gix)
{
	$g;
	if ($gix == 0) {
		$g = 'Active';
		return $g;
	} else {
		$g = 'Suspended';
		return $g;
	}
}

function getrole($gix)
{
	$g;
	if ($gix == 0) {
		$g = 'Admin';
		return $g;
	} else {
		$g = 'Accountant';
		return $g;
	}
}




?>



