<?php
session_start();

//connect to database
$conn = mysqli_connect("localhost", "root", "", "myblog");

if (!$conn){
    die("Failed to connect to database");
}

define("ROOT_PATH", realpath(dirname(__FILE__)));

?>