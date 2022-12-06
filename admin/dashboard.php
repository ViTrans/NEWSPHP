<?php require_once "./layouts/header.php";





?>


<?php




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