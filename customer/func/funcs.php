<?php
function getPost($con){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name
    FROM posts";
    return mysqli_query($con,$sql);
}
function getCategory($con){
    $sql = "SELECT * FROM category";
    return mysqli_query($con,$sql);
}
function getFeaturedPost($con){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name
    FROM posts WHERE featured = 1 AND status = 0  ORDER BY created_at DESC LIMIT 4";
    return mysqli_query($con,$sql);
}
function getPostByCategory($con,$id){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name
    FROM posts WHERE category_id = $id";
    return mysqli_query($con,$sql);
}
function getPostById($con,$id){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name FROM posts WHERE id = $id";
    return mysqli_query($con,$sql);
}
function getCommentByPostId($con,$id){
    $sql = "SELECT *, (SELECT username FROM users WHERE users.id = comments.user_id) AS user_name ,(SELECT avatar FROM users WHERE users.id = comments.user_id) AS avatar FROM comments WHERE post_id = $id";
    return mysqli_query($con,$sql);
}
function deleteComment($con,$id){
    $sql = "DELETE FROM comments WHERE id = $id";
    return mysqli_query($con,$sql);
}

?>