<?php
include './func/connect.php';
$id = $_GET['id'];
$result = getPostById($con,$id);
$row = mysqli_fetch_assoc($result);
$re = getCategory($con);
?>
<div class="container">
    <div class="post-header-main">
        <div class="post-item">
            <a href="#" class="post-media">
                <img src="<?php echo $row['img']?>" alt="" class="post-image" />
            </a>
            <a href="?url=category.php&id=<?php echo $row['category_id']?>"
                class="post-category"><?php echo $row['category_name']?></a>
            <h3>
                <a href="#" class="post-title"><?php echo $row['title']?></a>
            </h3>
            <a href=" #" class="post-author">
                <time class="post-author-time">Ngày Tạo: <?= date("d-m-Y",strtotime($row['created_at'])) ?></time>
        </div>
        </a>
    </div>
    <div class="post-details-content">
        <div class="post-content-item">
            <?php echo html_entity_decode($row['description']) ?>
        </div>
    </div>
</div>
<?php include './post-comment.php'?>
<!-- <div class="post-related">
    <h2 class="heading">Bài Viết Liên Quan</h2>
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
</div> -->
</div>
</div>