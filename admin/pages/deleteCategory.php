<?php
$id = validateInputInt("id");


if (empty($id)) {
    setMsg("del_cate", "không tồn tại danh mục", "error");
    redirect("?page=danhsachdanhmuc");
} else {

    updated("category", "status = 0", "id='$id'");
    if (mysqli_affected_rows($con) <= 0) {
        setMsg("del_cate", "không tồn tại danh mục");
        redirect("?page=danhsachdanhmuc", "error");
    } else {
        setMsg("del_cate", "Xóa danh mục thành công");
        redirect("?page=danhsachdanhmuc");
    }
}
