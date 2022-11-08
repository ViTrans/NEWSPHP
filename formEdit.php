<?php require_once "./layouts/header.php" ?>

      <div class="content">
        <div class="section-heading">
          <h2>Sửa bài viết</h2>
          <button><a href="#">Quay lại</a></button>
        </div>
        <div>
          <div class="form-editing">
            <form action="">
              <div class="form-group">
                <label class="form-label">Tên bài viết <span>*</span></label>
                <input
                  class="form-input"
                  type="text"
                  placeholder="Tên bài viết..." />
              </div>
              <div class="form-group spacing">
                <span class="form-label">&nbsp;</span>
                <div class="error-msg flex-3">vui lòng nhập trường này !!</div>
              </div>
              <div class="form-group">
                <label class="form-label">Mô tả<span>*</span></label>
                <div id="editor-wrap">
                  <textarea id="editor"></textarea>
                </div>
              </div>
              <div class="form-group spacing">
                <span class="form-label">&nbsp;</span>
                <div class="error-msg flex-3"></div>
              </div>

              <div class="form-group">
                <label class="form-label"
                  >Danh mục bài viết <span>*</span></label
                >
                <select name="" class="form-input">
                  <option value="">Thể thao</option>
                  <option value="">Sức khỏe đời sống</option>
                  <option value="">Khoa học-công nghệ</option>
                </select>
              </div>
              <div class="form-group spacing">
                <span class="form-label">&nbsp;</span>
                <div class="error-msg flex-3"></div>
              </div>
              <div class="form-group">
                <span class="form-label">&nbsp;</span>
                <button class="flex-3 submit-button">
                  <a href="#">Thêm</a>
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
