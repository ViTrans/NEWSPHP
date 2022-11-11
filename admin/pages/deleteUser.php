<?php
$id = validateInputInt("id");


if (empty($id)) {
    setMsg("del_user", "Không tồn tại thành viên", "error");
    redirect("?page=danhsachthanhvien");
} else {

    updated("users", "status = 0", "id='$id'");
    if (mysqli_affected_rows($con) <= 0) {
        setMsg("del_user", "không tồn tại thành viên");
        redirect("?page=danhsachthanhvien", "error");
    } else {
        setMsg("del_user", "Xóa thành viên thành công");
        redirect("?page=danhsachthanhvien");
    }
}
