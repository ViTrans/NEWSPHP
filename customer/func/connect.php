<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "news";
date_default_timezone_set('Asia/Ho_Chi_Minh');
// Create connection
$con = new mysqli($servername, $username, $password, $database);
$con->set_charset('utf8mb4');

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// echo "Connected successfully";