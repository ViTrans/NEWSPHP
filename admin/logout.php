<?php
require_once "../config.php";
require_once "../connect.php";
require_once './functions.php';
session_start();
unset($_SESSION['admin']);
header("Location: index.php");
