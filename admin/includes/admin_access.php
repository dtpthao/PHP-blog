<?php

if (isset($_SESSION['user']) || ($_SESSION['user']['role'] != "admin")) {
    header("location: index.html");
}

?>