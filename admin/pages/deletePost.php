<?php
$id = validateInputInt("id");


if (empty($id)) {
    setMsg("del_post", "Không tồn tại bài viết này", "error");
    redirect("?page=danhsachbaiviet");
} else {
    $row = updated("posts", ['status' => 0], "id = '$id'");
    if ($row <= 0) {
        setMsg("del_post", "Không tồn tại bài viết này", "error");
        redirect("?page=danhsachbaiviet");
    } else {
        setMsg("del_post", " Xóa bài viết thành công");
        redirect("?page=danhsachbaiviet");
    }
}
