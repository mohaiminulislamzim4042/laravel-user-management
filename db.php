<?php
$host="localhost";
$user="root";
$password="";
$dbname="users_app";

$conn=mysqli_connect($host, $user, $password, $dbname);


if (!$conn){
    die("connection Failed:" .mysqli_connect_error());
}
?>