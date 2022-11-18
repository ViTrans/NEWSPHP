<?php

// lấy so bài viết
$result = getTotalPosts();

$posts = mysqli_fetch_assoc($result);

// lấy so bình luận
$result = getTotalComments();
$comments = mysqli_fetch_assoc($result);

// lấy so lượng danh mục
$result = getTotalCategories();
$categories = mysqli_fetch_assoc($result);

// lấy so lượng thành viên
$result = getThanhVienDangKy();
$users = mysqli_fetch_assoc($result);



?>


<div class="content">
    <div class="section-heading">
        <h2>Thống kê</h2>
        <?php displayMsg("login") ?>
    </div>
    <div class="cards">
        <ul>
            <div class="card">
                <div class="card-infor">
                    <span><?php echo $posts['baiviet'] ?></span>
                    <div class="card-title">Bài viết</div>
                </div>
                <div class="card-image">
                    <i class="fas fa-hand-holding-medical"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-infor">
                    <span><?= $comments['binhluan'] ?></span>
                    <div class="card-title">Bình Luận</div>
                </div>
                <div class="card-image">
                    <i class="fa-solid fa-spaghetti-monster-flying"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-infor">
                    <span><?= $categories['danhmuc'] ?></span>
                    <div class="card-title">Danh mục</div>
                </div>
                <div class="card-image">
                    <i class="fa-solid fa-people-group"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-infor">
                    <span><?= $users['thanhvien'] ?></span>
                    <div class="card-title">Thành viên</div>
                </div>
                <div class="card-image">
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </ul>
    </div>
</div>
</main>