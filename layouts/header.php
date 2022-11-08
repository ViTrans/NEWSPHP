<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script defer src="./js/main.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <title>trang thống kê</title>
</head>

<body>
    <div class="sidebar collapse">
        <div class="infor">
            <h2>Admin <span>Panel</span></h2>
        </div>

        <div class="menu-left">
            <ul>
                <li>
                    <a href="index.php" class="menu-link">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-link">
                        <i class="fa-solid fa-rectangle-list"></i>
                        <span>Danh mục</span>
                    </a>
                </li>
                <li>
                    <a href="post.php" class="menu-link">
                        <i class="fa-sharp fa-solid fa-book"></i>
                        <span>Bài viết</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="menu-link">
                        <i class="fa-solid fa-person-military-pointing"></i>
                        <span>Khách hàng</span>
                    </a>
                </li>
            </ul>
            <div class="logout">
                <a href="#">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Đăng xuất</span></a>
            </div>
        </div>
    </div>
    <main id="main">
        <div class="top-header">
            <i class="fa-solid fa-bars" id="bar_btn"></i>
            <div class="avatar">
                <h2>Anh Tuấn</h2>
                <img src="./images/avatar.png" alt="" />
            </div>
        </div>