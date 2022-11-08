<?php
?>
<div class="post-new">
    <h2 class="heading">
        Bài Viết Mới Nhất
    </h2>
    <div class="post-list">
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="post-item">
            <a href="?url=postDetails.php&id=<?php echo $row['id']?>" class="post-media">
                <img src="<?php echo $row['img']?>" alt="" class="post-image" />
            </a>
            <a href="?url=category.php&id=<?php echo $row['category_id']?>"
                class="post-category"><?php echo $row['category_name']?></a>
            <h3>
                <a href="?url=postDetails.php&id=<?php echo $row['id']?>"
                    class="post-title"><?php echo $row['title']?></a>
            </h3>
            <p class="post-desc">
                <?php echo $row['description']?>
            </p>
            <a href="#" class="post-author">
                <!-- <img src=<?php echo "../uploads/" . $row['user_avatar']?> class="post-author-image" /> -->
                <div class="post-author-info">
                    <!-- <h4 class="post-author-name"><?php echo $row['user_name']?></h4> -->
                    <time class="post-author-time"><?php echo $row['created_at'] ?></time>
                </div>
            </a>
        </div>
        <?php } ?>
    </div>
</div>