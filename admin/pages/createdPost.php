<?php

$categories = select(["category"], ['*'], "status = '1'");






if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $errors = [];
  $title = filterPost("title");
  $cate = validateInputInt("cate_id");
  $featured = validateInputInt("featured");
  $description = trim($_POST['description']);
  $file = handleFileUpload($_FILES['img']);
  if (is_array($file)) {
    $patch = $file[0];
  } else {
    $errors['img'] =  $file;
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
    } else {
      $row =  select(["posts"], ['*'], "title = '$title'");
      if (!empty($row)) {
        $errors['title'] = "tên bài viết đã tồn tại";
      }
    }
  }




  if (empty($errors)) {

    insert("posts", [
      'title' => $title, "description" => $description, 'category_id' => $cate, 'featured' => $featured,
      'img' => $patch,
      'created_at' => getCurrentDateTime(), 'updated_at' => getCurrentDateTime()
    ]);

    setMsg("created_post", "Thêm thành công bài viết");
    redirect("?page=danhsachbaiviet");
  } else {
    setMsg("created_post", "Thêm không thành công bài viết", "error");
  }
}


?>


<div class="content">
  <div class="section-heading">
    <h2>Thêm bài viết</h2>
    <?php displayMsg("created_post") ?>
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
            foreach ($categories as $row) :
            ?>
              <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group spacing">
          <span class="form-label">&nbsp;</span>
          <div class="error-msg flex-3"><?= $errors['cate'] ?? "" ?></div>
        </div>
        <div class="form-group">
          <label class="form-label">Tên bài viết <span>*</span></label>
          <input class="form-input" name="title" type="text" placeholder="Tên bài viết..." />
        </div>
        <div class="form-group spacing">
          <span class="form-label">&nbsp;</span>
          <div class="error-msg flex-3"><?= $errors['title'] ?? "" ?></div>
        </div>
        <div class="form-group">
          <label class="form-label">Mô tả bài viết <span>*</span></label>
          <div id="editor-wrap">
            <textarea name="description" id="editor"></textarea>
          </div>
        </div>
        <div class="form-group spacing">
          <span class="form-label">&nbsp;</span>
          <div class="error-msg flex-3"><?= $errors['description'] ?? "" ?></div>
        </div>
        <div class="form-group">
          <label class="form-label">Ảnh bài viết <span>*</span></label>
          <input class="form-input" type="file" name="img">
        </div>
        <div class="form-group spacing">
          <span class="form-label">&nbsp;</span>
          <div class="error-msg flex-3"><?= $errors['img'] ?? "" ?></div>
        </div>
        <div class="form-group">
          <label class="form-label">Nổi bật <span>*</span></label>
          <select name="featured" class="form-input">
            <option value="">[--Chọn--]</option>
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
        <div class="form-group spacing">
          <span class="form-label">&nbsp;</span>
          <div class="error-msg flex-3"><?= $errors['featured'] ?? "" ?></div>
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
  // Enable all default text formats:
  CKEDITOR.replace('editor');
</script>
</body>

</html>