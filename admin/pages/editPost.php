<?php



$id = validateInputInt("id", false);
if (empty($id)) {
    redirect("?page=danhsachbaiviet");
}


$post = select(
    ["posts", "category"],
    ["category.id as cate_id", "category.title as cate_title ", "posts.*"],
    "posts.status = 1 and posts.id = '$id' and category.status = 1
 and category.id=posts.category_id"
)[0];

if (empty($post)) {
    redirect("?page=danhsachbaiviet");
}


$categories = select(["category"], ['*'], "status = '1'");





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
            unlink($post['img']);
        } else {
            $errors['img'] =  $file;
        }
    }





    if (!is_numeric($cate)) {
        $errors['cate'] = "vui lòng  chọn danh mục";
    }


    if (!is_numeric($featured)) {
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



        updated(
            "posts",
            [
                'featured' => $featured,
                'img' => $path,
                'title' => $title,
                'description' => $description,
                'category_id' => $cate,
                'updated_at' => getCurrentDateTime(),
            ],
            "id = '$id'"
        );
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
                        foreach ($categories as $result) :
                        ?>
                            <option <?= $result['id'] == $post['cate_id'] ? "selected" :
                                        false ?> value="<?= $result['id'] ?>"><?= $result['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group spacing">
                    <span class="form-label">&nbsp;</span>
                    <div class="error-msg flex-3"><?= $errors['cate'] ?? "" ?></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Tên bài viết <span>*</span></label>
                    <input value="<?= $post["title"] ?>" class="form-input" name="title" type="text" placeholder="Tên bài viết..." />
                </div>
                <div class="form-group spacing">
                    <span class="form-label">&nbsp;</span>
                    <div class="error-msg flex-3"><?= $errors['title'] ?? "" ?></div>
                </div>
                <div class="form-group">
                    <label class="form-label">Mổ tả bài viết <span>*</span></label>
                    <div id="editor-wrap">
                        <textarea name="description" id="editor"><?= $post["description"] ?></textarea>
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
                        <img src="<?= $post["img"] ?>" alt="">
                        <input value="<?= $post["img"] ?>" type="hidden" name="path">
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
                        <option <?= $post['featured'] == '1' ? "selected" : false ?> value="1">Yes</option>
                        <option <?= $post['featured'] == '0' ? 'selected' : false ?> value="0">No</option>
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