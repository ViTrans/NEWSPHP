<?php
function getPost($con){
    $sql = "SELECT * FROM post";
    return mysqli_query($con,$sql);
}
function getPostById($con,$id){
    $sql = "SELECT * FROM post WHERE id = $id";
    return mysqli_query($con,$sql);
}
function getPostByCategoryId($con,$id){
    $sql = "SELECT * FROM post WHERE category_id = $id";
    return mysqli_query($con,$sql);
}
function getPostCategory($con){
    $sql = "SELECT * FROM category";
    return mysqli_query($con,$sql);
}
// function signup($password,$username,$email,$birthday,$gender,$con){
//         $pass = password_hash($password, PASSWORD_DEFAULT);
//         $sql = "INSERT INTO `user` (`id`, `username`, `password`, `email`, `avatar`, `gender`, `birthday`, `level`) VALUES (NULL, '$username', '$pass', '$email', '', '$gender', '$birthday', '0');";
//       $query = mysqli_query($con, $sql);
//       if($query){
//         header("Location: login.php");
//       }
//       else{
//         echo "Đăng ký thất bại";
//       }
// }
   
?>