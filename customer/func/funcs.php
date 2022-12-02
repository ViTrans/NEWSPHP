<?php
function getPost($con){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name
    FROM posts where status = 1 AND featured = 0 limit 3";
    return mysqli_query($con,$sql);
}
function getCategory($con){
    $sql = "SELECT * FROM category where status = 1";
    return mysqli_query($con,$sql);
}
function getFeaturedPost($con){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name
    FROM posts WHERE featured = 1 AND status = 1  ORDER BY created_at DESC LIMIT 4";
    return mysqli_query($con,$sql);
}
function getPostByCategory($con,$id){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name
    FROM posts WHERE category_id = $id and status = 1";
    return mysqli_query($con,$sql);
}
function getPostById($con,$id){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name FROM posts WHERE id = $id and status = 1";
    return mysqli_query($con,$sql);
}
function getCommentByPostId($con,$id){
    $sql = "SELECT *, (SELECT username FROM users WHERE users.id = comments.user_id) AS user_name ,(SELECT avatar FROM users WHERE users.id = comments.user_id) AS avatar FROM comments WHERE post_id = $id";
    return mysqli_query($con,$sql);
}
function getProfile($con,$id){
    $sql = "SELECT * FROM users WHERE id = $id";
    return mysqli_query($con,$sql);
}
function editProfile($con,$id,$username,$email,$avatar){
    $sql = "UPDATE users SET username = '$username', email = '$email', avatar = '$avatar' WHERE id = $id";
    return mysqli_query($con,$sql);
}
function loadMore($con,$id){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name FROM posts WHERE id > $id and status = 1 AND featured = 0 LIMIT 3";
    return mysqli_query($con,$sql);
}
function postComments ($con,$post_id,$user_id,$content,$created_at){
    $sql = "INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`, `updated_at`, `status`) VALUES (NULL, '$post_id', '$user_id', '$content', '$created_at', '2022-11-10 14:09:22.000000', '0');";
    return mysqli_query($con,$sql);
}
function postRelated($con,$id){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name FROM posts WHERE category_id = $id and status = 1  LIMIT 3";
    return mysqli_query($con,$sql);
}
function signup($con,$username,$email,$password,$avatar,$birthday,$gender){
    $sql = "INSERT INTO `users` (`id`, `email`, `username`, `password`, `avatar`, `birthday`, `gender`, `status`) VALUES (NULL, '$email', '$username', '$password', '$avatar', '$birthday', '$gender', '0');";
    return mysqli_query($con,$sql);
}
function login($con,$email){
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    return mysqli_query($con,$sql);
}
function timeAgo($time_ago){
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "Vừa xong";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "1 phút trước";
        }
        else{
            return "$minutes phút trước";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "1 giờ trước";
        }else{
            return "$hours giờ trước";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "Hôm qua";
        }else{
            return "$days ngày trước";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "1 tuần trước";
        }else{
            return "$weeks tuần trước";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "1 tháng trước";
        }else{
            return "$months tháng trước";
        }
    }
    //Years
    else{
        if($years==1){
            return "1 năm trước";
        }else{
            return "$years năm trước";
        }
    }
}
?>