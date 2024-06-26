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
    <title>NEWS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="./style/signup.css" /> -->
    <link rel="stylesheet" href="./style/login.css" />
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
    <?php include './footer.php' ?>
    <div class="icon-darkmode">
        <i class="fa-solid fa-moon"></i>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/main.js"></script>

</body>

</html>