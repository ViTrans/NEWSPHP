<?php
require_once "../config.php";
require_once "../connect.php";
require_once './functions.php';
session_start();    
unset($_SESSION['admin']);
setMsg("logout", "bạn đã đăng xuất thành không ^^^");
header("Location: index.php");
