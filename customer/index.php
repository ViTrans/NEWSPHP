<?php
include_once 'func/connect.php';
include_once 'func/funcs.php';
session_start();
$result = getPost($con);
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
    <section>
        <div class="hero">
            <div class="slider">
                <ul class="slider-dots">
                    <li class="slider-dot-item active" data-index="0"></li>
                    <li class="slider-dot-item" data-index="1"></li>
                    <li class="slider-dot-item" data-index="2"></li>
                    <li class="slider-dot-item" data-index="3"></li>
                </ul>
                <div class="slider-wrapper">
                    <div class="slider-main">
                        <div class="slider-item">
                            <img src="https://vatvostudio.vn/wp-content/uploads/2022/08/Apple-day-manh-quang-cao-tren-iPhone-3.jpg"
                                alt="" />
                        </div>
                        <div class="slider-item">
                            <img src="https://vatvostudio.vn/wp-content/uploads/2022/10/iCloud-Beta.jpg" alt="" />
                        </div>
                        <div class="slider-item">
                            <img src="https://vatvostudio.vn/wp-content/uploads/2022/10/OneUi-5.jpg" alt="" />
                        </div>
                        <div class="slider-item">
                            <img src="https://vatvostudio.vn/wp-content/uploads/2022/10/Twitter-ElonMusk.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <h2 class="heading">
            Bài Viết Nổi Bật
        </h2>
        <div class="post-feature">
            <a href="#" class="post-feature-media post-media">
                <img src="https://cdn.dribbble.com/users/2539288/screenshots/15326794/media/4c3268cdbc069e4ff03979d9b9a16e11.jpg?compress=1&resize=1600x1200"
                    alt="" class="post-feature-image" />
            </a>
            <div class="post-feature-info">
                <a href="#" class="post-category">The newest</a>
                <h2>
                    <a href="#"
                        class="post-feature-title post-title">HowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmmHowmmmm</a>
                </h2>
                <p class="post-desc">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Pariatur
                    quas distinctio, quis minima magni sint accusamus! Aliquid
                    distinctio unde porro adipisci totam itaque, laudantium natus!
                    Repudiandae perferendis mollitia ipsam repellendus.
                </p>
                <a href="#" class="post-author">
                    <img src="https://cdn.dribbble.com/users/4674461/screenshots/15330665/media/fe4a38ceca4300ac0614483ab9e7a0d7.png?compress=1&resize=1600x1200"
                        alt="" class="post-author-image" />
                    <div class="post-author-info">
                        <h4 class="post-author-name">By Sebastian</h4>
                        <time class="post-author-time">Just now</time>
                    </div>
                </a>
            </div>
        </div>
        <div class="post-list">
            <div class="post-item">
                <a href="#" class="post-media">
                    <img src="https://cdn.dribbble.com/users/5209175/screenshots/15329869/media/46b95b0ec58274621935463cd534f793.jpg?compress=1&resize=1600x1200"
                        alt="" class="post-image" />
                </a>
                <a href="#" class="post-category">Shop</a>
                <h3>
                    <a href="#" class="post-title">How to choose best bike for spring in Australia</a>
                </h3>
                <p class="post-desc">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                    at quae architecto perspiciatis dolore deleniti, voluptas aperiam
                    dolorem sit. Est in asperiores ipsa repellat sit odit eos quia
                    nostrum quae.
                </p>
                <a href="#" class="post-author">
                    <img src="https://cdn.dribbble.com/users/4674461/screenshots/15330665/media/fe4a38ceca4300ac0614483ab9e7a0d7.png?compress=1&resize=1600x1200"
                        alt="" class="post-author-image" />
                    <div class="post-author-info">
                        <h4 class="post-author-name">By Sebastian</h4>
                        <time class="post-author-time">Just now</time>
                    </div>
                </a>
            </div>
            <div class="post-item">
                <a href="#" class="post-media">
                    <img src="https://cdn.dribbble.com/users/4674461/screenshots/15330665/media/fe4a38ceca4300ac0614483ab9e7a0d7.png?compress=1&resize=1600x1200"
                        alt="" class="post-image" />
                </a>
                <a href="#" class="post-category">Shop</a>
                <h3>
                    <a href="#" class="post-title">How to choose best bike for spring in Australia</a>
                </h3>
                <p class="post-desc">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                    at quae architecto perspiciatis dolore deleniti, voluptas aperiam
                    dolorem sit. Est in asperiores ipsa repellat sit odit eos quia
                    nostrum quae.
                </p>
                <a href="#" class="post-author">
                    <img src="https://cdn.dribbble.com/users/4674461/screenshots/15330665/media/fe4a38ceca4300ac0614483ab9e7a0d7.png?compress=1&resize=1600x1200"
                        alt="" class="post-author-image" />
                    <div class="post-author-info">
                        <h4 class="post-author-name">By Sebastian</h4>
                        <time class="post-author-time">Just now</time>
                    </div>
                </a>
            </div>
            <div class="post-item">
                <a href="#" class="post-media">
                    <img src="https://cdn.dribbble.com/users/486985/screenshots/15329016/media/de4829c5298afd8ed930e796154e276a.jpg?compress=1&resize=1600x1200"
                        alt="" class="post-image" />
                </a>
                <a href="#" class="post-category">Shop</a>
                <h3>
                    <a href="#" class="post-title">How to choose best bike for spring in Australia</a>
                </h3>
                <p class="post-desc">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam
                    at quae architecto perspiciatis dolore deleniti, voluptas aperiam
                    dolorem sit. Est in asperiores ipsa repellat sit odit eos quia
                    nostrum quae.
                </p>
                <a href="#" class="post-author">
                    <img src="https://cdn.dribbble.com/users/4674461/screenshots/15330665/media/fe4a38ceca4300ac0614483ab9e7a0d7.png?compress=1&resize=1600x1200"
                        alt="" class="post-author-image" />
                    <div class="post-author-info">
                        <h4 class="post-author-name">By Sebastian</h4>
                        <time class="post-author-time">Just now</time>
                    </div>
                </a>
            </div>
        </div>
        <?php
        include './postNews.php'
         ?>
    </div>
    <?php include './footer.php' ?>
    <script src="./js/main.js"></script>
</body>

</html>