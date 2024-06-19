<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "users";


$con = mysqli_connect($server , $username , $password , $db);
if(!$con){
    die("Connection Failed Due to :" . mysqli_connect_error());
}


?>