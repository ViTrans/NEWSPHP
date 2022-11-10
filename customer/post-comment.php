<?php
// add comment
if(isset($_SESSION['user'])){
    if(isset($_POST['comment'])){
        $user_id = $_SESSION['user']['id'];
        $comment = $_POST['comment'];
        $post_id = $_GET['id'];
        $created_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`, `updated_at`, `status`) VALUES (NULL, '$post_id', '$user_id', '$comment', '$created_at', '2022-11-10 14:09:22.000000', '0');";
        $result = mysqli_query($con,$sql);
        if($result){
            header("Location: ?url=postDetails.php&id=$post_id");
        }
    }
}
$re = getCommentByPostId($con,$_GET['id']);
?>
<div class="post-comment">
    <div class="post-comment__heading">
        <h3>Bình Luận</h3>
    </div>
    <div class="post-comment__form">
        <form method="POST">
            <div class="form-group">
                <textarea name="comment"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Gửi</button>
            </div>
        </form>
    </div>
    <div class="post-comment__list">
        <?php foreach ($re as $key => $value) : ?>
        <div class="post-comment__item">
            <div class="post-comment__item__avatar">
                <img src="<?php echo "../uploads/" . $value['avatar']?>" alt="">
            </div>
            <div class="post-comment__item__content">
                <div class="post-comment__item__content__info">
                    <h4 class="name"><?php echo $value['user_name']?></h4>
                    <time class="date"><?= date("d-m-Y",strtotime($row['created_at']))?></time>
                </div>
                <div class="post-comment__item__content__text">
                    <?php echo $value['content']?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>