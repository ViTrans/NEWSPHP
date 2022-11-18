<?php



$id = validateInputInt("id", false);
if (empty($id)) {
    setMsg("edit_post", "không tồn tại bài viết", "error");
    redirect("?page=danhsachbaiviet");
}


$post = getWhere("posts,category", "posts.status = 1 and posts.id = '$id' and category.id=posts.category_id", ["category.id as cate_id , category.title as cate_title,posts.*"]);

if ($post->num_rows <= 0) {
    setMsg("edit_post", "không tồn tại bài viết", "error");
    redirect("?page=danhsachbaiviet");
}

$result = mysqli_fetch_all($post, MYSQLI_ASSOC)[0];
$categories = getWhere("category", "status = '1'");








if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $errors = [];
    $title = filterPost("title");
    $cate = validateInputInt("cate_id");
    $featured = validateInputInt("featured", true, 0);
    $description = trim($_POST['description']);
    // ko up img thi lay anh cu
    if (empty($_FILES['img']['name'])) {
        $path = $_POST['path'];
    } else {
        $file = handleFileUpload($_FILES['img']);
        if (is_array($file)) {
            $path = $file[0];
        } else {
            $errors['img'] =  $file;
        }
    }





    if ($cate == false || $cate == null) {
        $errors['cate'] = "vui lòng  chọn danh mục";
    }


    if (!isset($featured) && $featured != false) {
        $errors['featured'] = "vui lòng chọn trường nổi bật";
    }

    if (empty($description)) {
        $errors['description'] = "vui lòng nhập mô tả bài viết";
    } else {

        if (strlen($description) <= 500) $errors['description'] = "Mô tả phải ít nhất 500 kí tự ^^";
    }

    if (empty($title)) {

        $errors['title'] = "vui lòng nhập tên bài viết";
    } else {
        $pattern = "/^[^\~\^\@\/\#\$\*\{\}\!\.\:\;\?\>\<\+\[\]\=]{2}.{0,328}$/u";
        if (!preg_match($pattern, $title)) {
            $errors['title'] = "tên bài viết không hợp lệ";
        }
    }




    if (empty($errors)) {

        updated("posts", "featured = $featured ,img = '$path' ,title = '$title'
        ,description = '$description', category_id = '$cate' ,updated_at = '"
            . date("Y-m-d H:i:s", time()) . "'", "id = '$id'");
        setMsg("edit_post", "Sửa thành công bài viết");
        redirect("?page=danhsachbaiviet");
    } else {
        setMsg("edit_post", "Sửa không thành công bài viết", "error");
    }
}


?>


<div class="content">
    <div class="section-heading">
        <h2>Thêm bài viết</h2>
        <?php displayMsg("edit_post") ?>
        <button><a href="?page=danhsachbaiviet">Quay lại</a></button>
    </div>
    <div>
        <div class="form-editing">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="form-label">Tên danh mục <span>*</span></label>
                    <select name="cate_id" class="form-input">
                        <option value="">[--Chọn tên danh mục--]</option>
                        <?php
                        while ($cate = mysqli_fetch_assoc($categories)) :
                        ?>
                            <option <?= $result['cate_id'] == $cate['id'] ? "selected" : false ?> value="<?= $cate['id'] ?>"><?= $cate['title'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group spacing">
                    <span class="form-label">&nbsp;</span>
                    <div class="error-msg flex-3"><?= $errors['cate'] ?? "" ?></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Tên bài viết <span>*</span></label>
                    <input value="<?= $result["title"] ?>" class="form-input" name="title" type="text" placeholder="Tên bài viết..." />
                </div>
                <div class="form-group spacing">
                    <span class="form-label">&nbsp;</span>
                    <div class="error-msg flex-3"><?= $errors['title'] ?? "" ?></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Mổ tả bài viết <span>*</span></label>
                    <div id="editor-wrap ">
                        <textarea name="description" id="editor"><?= $result["description"] ?></textarea>
                    </div>
                </div>
                <div class="form-group spacing">
                    <span class="form-label">&nbsp;</span>
                    <div class="error-msg flex-3"><?= $errors['description'] ?? "" ?></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Ảnh bài viết <span>*</span></label>

                    <div class="row">
                        <input class="form-input" type="file" name="img">
                        <img src="<?= $result["img"] ?>" alt="">
                        <input value="<?= $result["img"] ?>" type="hidden" name="path">
                    </div>
                </div>
                <div class="form-group spacing">
                    <span class="form-label">&nbsp;</span>
                    <div class="error-msg flex-3"><?= $errors['img'] ?? "" ?></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Nổi bật <span>*</span></label>
                    <select name="featured" class="form-input">
                        <option value="">[--Chọn--]</option>
                        <option <?= $result['featured'] === '1' ? "selected" : false ?> value="1">Yes</option>
                        <option <?= $result['featured'] === '0' ? "selected" : false ?> value="0">No</option>
                    </select>
                </div>
                <div class="form-group spacing">
                    <span class="form-label">&nbsp;</span>
                    <div class="error-msg flex-3"><?= $errors['featured'] ?? "" ?></div>
                </div>
                <div class="form-group">
                    <span class="form-label">&nbsp;</span>
                    <button class="flex-3 submit-button">
                        Sửa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>
<script>
    CKEDITOR.replace('editor');
</script>
</body>

</html>