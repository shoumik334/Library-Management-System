<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="lms";

if(!$con=mysqli_connect($dbhost,$dbuser,$dbpass, $dbname))
{
    die("failed to connect");
}
?>