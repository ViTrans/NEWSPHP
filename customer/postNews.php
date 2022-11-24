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
            <div class="post-desc">
                <?php echo html_entity_decode($row['description'])?>
            </div>
            <a href="#" class="post-author">
                <div class="post-author-info">
                    <time class="post-author-time">Ngày Tạo: <?= date("d-m-Y",strtotime($row['created_at'])) ?></time>
                </div>
            </a>
        </div>
        <?php } ?>
        <div class="show-more-btn">
            <button type="button" class="btn btn-primary" id="<?php echo $id ?>">Xem Thêm</button>
        </div>
    </div>
</div>