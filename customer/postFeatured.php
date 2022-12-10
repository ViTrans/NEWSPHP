<?php
include './func/connect.php';
$result = getAllFeaturedPost($con);
?>
<div class="container">
    <h2 class="heading">Bài Viết Nổi Bật</h2>
    <div class="post-list">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="post-item">
            <a href="?url=postDetails.php&id=<?php echo $row['id']?>" class="post-media">
                <img src="<?php echo $row['img']?>" alt="" class="post-image" />
            </a>
            <a href="#" class="post-category"><?php echo $row['category_name']?></a>
            <h3>
                <a href="?url=postDetails.php&id=<?php echo $row['id']?>"
                    class="post-title"><?php echo $row['title']?></a>
            </h3>
            <div class="post-desc">
                <?php echo html_entity_decode($row['description'])?>
            </div>
            <a href="#" class="post-author">
                <!-- <img src="https://cdn.dribbble.com/users/4674461/screenshots/15330665/media/fe4a38ceca4300ac0614483ab9e7a0d7.png?compress=1&resize=1600x1200"
                    alt="" class="post-author-image" /> -->
                <div class="post-author-info">
                    <!-- <h4 class="post-author-name"><?php echo $row['user_name']?></h4> -->
                    <time class="post-author-time"><?php echo $row['created_at'] ?></time>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>