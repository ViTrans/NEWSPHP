<?php
include './func/connect.php';
$id = $_GET['id'];
$result = getPostById($con,$id);
$row = mysqli_fetch_assoc($result);
$re = getCategory($con);
postRelated($con,$row['category_id']);
$resultPostRelated = postRelated($con,$row['category_id']);
?>
<div class="container">
    <div class="post-header-main">
        <div class="post-item">
            <a href="#" class="post-media">
                <img src="<?php echo $row['img']?>" alt="" class="post-image" />
            </a>
            <div>
                <a href="?url=category.php&id=<?php echo $row['category_id']?>"
                    class="post-category"><?php echo $row['category_name']?></a>
            </div>
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
    <div class="post-related">
        <?php if(isset($resultPostRelated) && mysqli_num_rows($resultPostRelated) > 0){ ?>
        <h2 class="heading">Bài Viết Liên Quan</h2>
        <?php } ?>
        <div class="post-list">
            <?php foreach ($resultPostRelated as $key => $value) : ?>
            <div class="post-item">
                <a href="?url=postDetails.php&id=<?php echo $value['id']?>" class="post-media">
                    <img src="<?php echo $value['img']?>" alt="" class="post-image" />
                </a>
                <a href="?url=category.php&id=<?php echo $value['category_id']?>"
                    class="post-category"><?php echo $value['category_name']?></a>
                <h3>
                    <a href="?url=postDetails.php&id=<?php echo $value['id']?>"
                        class="post-title"><?php echo $value['title']?></a>
                </h3>
                <div class="post-desc">
                    <?php echo html_entity_decode($value['description'])?>
                </div>
                <a href="#" class="post-author">
                    <div class="post-author-info">
                        <time class="post-author-time"><?php echo $value['created_at']?></time>
                    </div>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php include './post-comment.php'?>
</div>
</div>
</div>
<a href="#top" class="sroll-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
    </svg>
</a>