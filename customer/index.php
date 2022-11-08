<?php
include_once 'func/connect.php';
include_once 'func/funcs.php';
$page = basename($_SERVER['PHP_SELF']);
session_start();
$result = getPost($con);
$re = getCategory($con);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"
        integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
    <?php include './header.php' ?>
    <?php if(isset($_GET['url'])){
            include $_GET['url'];
        }
        elseif($page == 'index.php'){
            include './main.php';
        }
        ?>
    <script src="./js/main.js"></script>
</body>

</html>