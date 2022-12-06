<?php 
$id = $_GET['id'];
if(isset($_SESSION['user'])){
    $user_id = $_SESSION['user']['id'];
    $post_id = $_GET['postdetails'];
    $sql = "SELECT * FROM comments WHERE user_id = $user_id AND post_id = $post_id";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) > 0){
        $sql = "DELETE FROM comments WHERE id = $id";
        $result = mysqli_query($con,$sql);
        if($result){
            header("Location: ?url=postDetails.php&id=$post_id");
        }
    }
}
?>