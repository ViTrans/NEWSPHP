<?php
include_once 'func/connect.php';
$output = '';
$id = $_POST['id'];
$sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name FROM posts WHERE id > $id and status = 1 AND featured = 0 LIMIT 3";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $output .= '
        <div class="post-item">
            <a href="?url=postDetails.php&id='.$row['id'].'" class="post-media">
                <img src="'.$row['img'].'" alt="" class="post-image" />
            </a>
            <a href="?url=category.php&id='.$row['category_id'].'" class="post-category">'.$row['category_name'].'</a>
            <h3>
                <a href="?url=postDetails.php&id='.$row['id'].'" class="post-title">'.$row['title'].'</a>
            </h3>
            <div class="post-desc">
                '.html_entity_decode($row['description']).'
            </div>
            <a href="#" class="post-author">
                <div class="post-author-info">
                    <time class="post-author-time">Ngày Tạo: '.date("d-m-Y",strtotime($row['created_at'])).'</time>
                </div>
            </a>
        </div>
        ';
        $id = $row['id'];
    }
    $output .= '
    <div class="show-more-btn">
        <button type="button" class="btn btn-primary" id="'.$id.'">Xem Thêm</button>
    </div>
    ';
    echo $output;
}



?>