<?php
session_start();
require_once "../config.php";
require_once "../connect.php";
require_once './functions.php';

if (!isset($_SESSION['admin'])) {
    echo "<script>window.location.href='index.php'</script>";
}



$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_SPECIAL_CHARS);
$pagelist = [
    "danhsachdanhmuc" => "./pages/category.php",
    "xoadanhmuc" => "./pages/deleteCategory.php",
    "xoabaiviet" => "./pages/deletePost.php",
    "themdanhmuc" => "./pages/createdCategory.php",
    "suabaiviet" => "./pages/editPost.php",
    "thembaiviet" => "./pages/createdPost.php",
    "suadanhmuc" => "./pages/editCategory.php",
    "danhsachbaiviet" => "./pages/post.php",
    'danhsachnguoidung' => './pages/user.php',
    'xoanguoidung' => './pages/deleteUser.php',
    'suanguoidung' => './pages/editUser.php',
];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.9.2/full-all/ckeditor.js"></script>
    <script defer src="./js/main.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <title>Trang thống kê</title>
</head>

<div>

</div>

<body>
    <div class="sidebar">
        <div class="infor">
            <h2>Admin <span>Panel</span></h2>
        </div>

        <div class="menu-left">
            <ul>
                <li>
                    <a href="dashboard.php" class="menu-link <?= $_GET['page'] ?? 'active' ?>">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
                <li>
                    <a href="?page=danhsachdanhmuc" class="menu-link <?= activeLink($caterogies) ?>">
                        <i class="fa-solid fa-rectangle-list"></i>
                        <span>Danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="?page=danhsachbaiviet" class="menu-link <?= activeLink($posts) ?>">
                        <i class="fa-sharp fa-solid fa-book"></i>
                        <span>Bài viết</span>
                    </a>
                </li>
                <li>
                    <a href="?page=danhsachnguoidung" class="menu-link <?= activeLink($users) ?>">
                        <i class="fa-solid fa-user"></i>
                        <span>Thành Viên</span>
                    </a>
                </li>
            </ul>
            <div class="logout">
                <a href="logout.php">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Đăng xuất</span></a>
            </div>
        </div>
    </div>
    <main id="main">
        <div class="top-header">
            <i class="fa-solid fa-bars" id="bar_btn"></i>
            <div class="avatar">
                <h2><?= $_SESSION['admin']['username'] ?></h2>
                <img src="./images/avatar.png" />
            </div>
        </div>