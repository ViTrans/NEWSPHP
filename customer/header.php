<?php
include './func/connect.php';
$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
?>
<header>
    <div class="navbar">
        <a href="#" class="logo">
            <!-- <img
            src="https://images.unsplash.com/photo-1666946095494-a31ef4e58450?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
            alt=""
            class="logo-image"
          /> -->
            NEWS
        </a>
        <ul class="menu">
            <li class="menu-item">
                <a href="index.php" class="menu-link">Trang Chủ</a>
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">Tin Tức <i class="fa-solid fa-sort-down"></i></a>
                <ul>
                    <?php foreach ($re as $key => $value) : ?>
                    <li>
                        <a href="category.php?id=<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
        <div class="account">
            <?php if (!empty($user['email'])) { ?>
            <div class="account-img">
                <img src="https://images.unsplash.com/photo-1666904093866-bacfa77008f2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                    alt="" />
                <ul>
                    <li>
                        <a href="./profile.php">Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="./logout.php">Đăng Xuất</a>
                    </li>
                </ul>
            </div>
            <?php } else { ?>
            <a class="btn btn-account" href="./login.php">Đăng Ký</a>
            <?php } ?>
        </div>
    </div>
</header>