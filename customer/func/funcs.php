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
    FROM posts WHERE featured = 1 AND status = 0";
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

?>