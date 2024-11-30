<?php
$hostname = "localhost";
$username = "root";
$password = "";

$database = "lms2";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die( mysqli_connect_error());
}
?>