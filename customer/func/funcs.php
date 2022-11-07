<?php
function getPost($con){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name ,(SELECT username FROM users WHERE users.id = posts.user_id) AS user_name
    FROM   posts";
    return mysqli_query($con,$sql);
}
function getCategory($con){
    $sql = "SELECT * FROM category";
    return mysqli_query($con,$sql);
}
function getPostByCategory($con,$id){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name ,(SELECT username FROM users WHERE users.id = posts.user_id) AS user_name
    FROM posts WHERE category_id = $id";
    return mysqli_query($con,$sql);
}
function getPostById($con,$id){
    $sql = "SELECT *, (SELECT title FROM category WHERE category.id = posts.category_id) AS category_name ,(SELECT username FROM users WHERE users.id = posts.user_id) AS user_name, (SELECT avatar FROM users WHERE users.id = posts.user_id) AS user_avatar
    FROM posts WHERE $id";
    return mysqli_query($con,$sql);
}  
?>