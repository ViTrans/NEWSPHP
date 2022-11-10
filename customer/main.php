<?php include './hero.php';
$re = getFeaturedPost($con);

$row = mysqli_fetch_all($re, MYSQLI_ASSOC);
// echo '<pre>';
// var_dump($row[3]);
// echo '</pre>';
?>
<div class="container">
    <h2 class="heading">
        Bài Viết Nổi Bật
    </h2>
    <div class="post-feature">
        <a href="?url=postDetails.php&id=<?php echo $row[0]['id']?>" class="post-feature-media post-media">
            <img src="<?php echo $row[0]['img'] ?>" alt="" class="post-feature-image" />
        </a>
        <div class="post-feature-info">
            <a href="?url=category.php&id=<?php echo $row[0]['category_id']?>"
                class="post-category"><?php echo $row[0]['category_name']?></a>
            <h2>
                <a href="?url=postDetails.php&id=<?php echo $row[0]['id']?>"
                    class="post-feature-title post-title"><?= $row[0]['title'] ?></a>
            </h2>
            <p class="post-desc">
                <?= $row[0]['description'] ?>
            </p>
            <a href="#" class="post-author">
                <div class="post-author-info">
                    <time class="post-author-time">Ngày Tạo:
                        <?= date("d-m-Y",strtotime($row[0]['created_at'])) ?></time>
                </div>
            </a>
        </div>

    </div>
    <div class="post-list">
        <?php for ($i = 1; $i < count($row); $i++) : ?>


        <div class="post-item">
            <a href="?url=postDetails.php&id=<?php echo $row[$i]['id']?>" class="post-media">
                <img src="<?php echo $row[$i]['img'] ?>" alt="" class="post-image" />
            </a>
            <a href="?url=category.php&id=<?php echo $row[$i]['category_id']?>"
                class="post-category"><?= $row[$i]['category_name']?></a>
            <h3>
                <a href="?url=postDetails.php&id=<?php echo $row[$i]['id']?>"
                    class="post-title"><?= $row[$i]['title'] ?></a>
            </h3>
            <p class="post-desc">
                <?= $row[$i]['description'] ?>
            </p>
            <a href="#" class="post-author">
                <div class="post-author-info">
                    <time class="post-author-time">Ngày Tạo:
                        <?= date("d-m-Y",strtotime($row[$i]['created_at'])) ?></time>
                </div>
            </a>
        </div>
        <?php endfor; ?>
    </div>
    <?php
    include './postNews.php';
    ?>
</div>