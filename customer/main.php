<?php include './hero.php';
$re = getFeaturedPost($con);
?>
<div class="container">
    <h2 class="heading">
        Bài Viết Nổi Bật
    </h2>
    <div class="post-feature">
        <?php while($row = mysqli_fetch_assoc($re)) { ?>
        <a href="#" class="post-feature-media post-media">
            <img src="<?php echo $row['img']?>" alt="" class="post-feature-image" />
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
        <?php } ?>
    </div>
    <div class="post-list">
        <div class="post-item">
            <a href="#" class="post-media">
                <img src="<?php echo $row['img']?>" alt="" class="post-image" />
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
            include './postNews.php';
         ?>
</div>