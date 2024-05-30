<?php
$server = "localhost";
$user = "jeremy";
$password = "jeremy";
$database = "php_exam";

$connection = new mysqli($server, $user, $password, $database);
echo "<script>console.log('Connected To Db SuccessFul')</script>";
