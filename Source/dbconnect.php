<?php 

$server = "localhost";
$user = "root";
$password = "";
$dbase = "fitzone";

$conn = mysqli_connect($server, $user, $password, $dbase);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    "Connected successfully";
}
?>