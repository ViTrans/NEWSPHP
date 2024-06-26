<?php
include './func/connect.php';
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
?>
<header>
    <div class="navbar">
        <a href="#" class="logo"> NEWS </a>
        <ul class="menu">
            <li class="menu-item">
                <a href="index.php" class="menu-link">Trang Chủ</a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">Tin Tức <i class="fa-solid fa-sort-down"></i></a>
                <ul>
                    <li>
                        <a href="?url=postFeatured.php">Nổi Bật</a>
                    </li>
                    <?php foreach ($re as $key =>
          $value) : ?>
                    <li>
                        <a href="?url=category.php&id=<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
        <div class="account">
            <?php if (!empty($user['email'])) { ?>
            <div class="account-img">
                <img src=<?php echo "../uploads/" . $user['avatar'] ?> alt="" />
                <ul>
                    <li>
                        <a href="?url=profile.php&id=<?php echo $_SESSION['user']['id'] ?>">Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="./logout.php">Đăng Xuất</a>
                    </li>
                </ul>
            </div>
            <?php } else { ?>
            <a class="btn btn-account" href="?url=login.php">
                <i class="fa-solid fa-user"></i>
            </a>
            <?php } ?>
        </div>
    </div>
</header>