<!-- edit user -->
<?php
$id = validateInputInt("id");
if(empty($id)){
    setMsg("edit_user","không tồn tại user","error");
    redirect("?page=danhsachnguoidung");
}else{
    $row = updated("users",['status'=>0],"id='$id'");
    if($row<=0){
        setMsg("edit_user","không tồn tại user","error");
        redirect("?page=danhsachnguoidung");
    }else{
        setMsg("edit_user","Xóa user thành công");
        redirect("?page=danhsachnguoidung");
    }
}
?>