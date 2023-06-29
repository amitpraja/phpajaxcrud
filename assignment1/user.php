<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'crud_app';

$con = new mysqli($servername,$username,$password,$db_name);

// echo"hello";
if ($con->connect_error) {
    # code...
    die("connection failed".$con->connect_error);
}

?>

