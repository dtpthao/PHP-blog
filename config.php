<?php
session_start();

//connect to database
$conn = mysqli_connect("localhost", "root", "", "myblog");

if (!$conn){
    die("Failed to connect to database");
}

define("ROOT_PATH", realpath(dirname(__FILE__)));
define("ADMIN_PATH", ROOT_PATH . "/admin/includes/");
define("DB_PATH", ROOT_PATH . "/DB/");

?>