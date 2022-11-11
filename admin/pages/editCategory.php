<?php

$id = validateInputInt("id", false);

if (empty($id)) {
    setMsg("edit_cate", "danh mục không tồn tại", "error");
    redirect("?page=danhsachdanhmuc");
} else {
    $result = getWhere("category", "status = 1 and id = '$id'");
    if ($result->num_rows == 0) {
        setMsg("edit_cate", "danh mục không tồn tại", "error");
        redirect("?page=danhsachdanhmuc");
    }
}


$row = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $error = "";
    $name = filterPost("name");
    if (empty($name)) {
        $error = "vui lòng nhập tên danh mục";
    } else {
        // 2-24 kí tự
        $pattern = "/^[^\d\s\~\^\@\/\#\$\*\{\}\!-\.\:\;\?\>\<\+\[\]\=]{2}[\w\s]{0,22}$/u";
        if (!preg_match($pattern, $name)) {
            $error = "tên danh mục không hợp lệ";
        } else {
            $row =  getWhere("category", "title = '$name'", ['title'])->num_rows;
            if ($row > 0) {
                $error = "tên danh mục đã tồn tại";
                setMsg("edit_cate", "Sửa danh mục không thành công", "error");
            }
        }
    }


    if (empty($error)) {
        updated("category", "title = '$name'", "id = '$id'");
        setMsg("edit_cate", "Sửa thành công danh mục");
        redirect("?page=danhsachdanhmuc");
    }
}


?>


<div class="content">
    <div class="section-heading">
        <h2>Sửa danh mục</h2>
        <?= displayMsg("edit_cate"); ?>
        <button><a href="?page=danhsachdanhmuc">Quay lại</a></button>
    </div>
    <div>
        <div class="form-editing">
            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Tên danh mục <span>*</span></label>
                    <input value="<?= $row['title'] ?? "" ?>" class="form-input" name="name" type="text" placeholder="Tên danh mục..." />
                </div>
                <div class="form-group spacing">
                    <span class="form-label">&nbsp;</span>
                    <div class="error-msg flex-3"><?= $error ?? "" ?></div>
                </div>
                <div class="form-group">
                    <span class="form-label">&nbsp;</span>
                    <button class="flex-3 submit-button">
                        Thêm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>
<script>
    CKEDITOR.replace("editor");
</script>
</body>

</html>