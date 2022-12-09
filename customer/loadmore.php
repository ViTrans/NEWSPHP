<?php
include_once 'func/connect.php';
include_once 'func/funcs.php';
$output = '';
$id = $_POST['id'];
// loadMorePostNews($con,$id);

$result = loadMorePostNews($con,$id);

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