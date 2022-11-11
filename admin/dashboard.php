<?php require_once "./layouts/header.php" ?>


<?php

$page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_SPECIAL_CHARS);
$pagelist = [
    "danhsachdanhmuc" => "./pages/category.php",
    "danhsachthanhvien" => "./pages/user.php",
    "xoadanhmuc" => "./pages/deleteCategory.php",
    "xoabaiviet" => "./pages/deletePost.php",
    "xoathanhvien" => "./pages/deleteUser.php",
    "themdanhmuc" => "./pages/createdCategory.php",
    "suabaiviet" => "./pages/editPost.php",
    "thembaiviet" => "./pages/createdPost.php",
    "suadanhmuc" => "./pages/editCategory.php",
    "danhsachbaiviet" => "./pages/post.php",
];


// nếu ko tồn tại biến page thì là trang thống kê
if (!empty($page)) {
    if (array_key_exists($page, $pagelist)) {
        require_once $pagelist[$page];
    } else {
    }
} else {
    require_once "./layouts/main.php";
}


?>


</body>

</html>