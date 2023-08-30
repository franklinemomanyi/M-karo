<?php
session_start();
if (session_destroy()) {
header("Location: /MKaro/Pages/View/signin.php");
}
?>