<?php

$result = getWhere("category", "status = 1 ORDER BY id desc");
?>
<div class="content">
  <div class="section-heading">
    <h2>Danh sách danh mục</h2>
    <?php displayMsg("created_cate") ?>
    <?php displayMsg("del_cate") ?>
    <?php displayMsg("edit_cate") ?>
    <button><a href="?page=themdanhmuc">Thêm danh mục</a></button>
  </div>
  <div class="data-listtings">
    <table>

      <tr>
        <th>#</th>

        <th>Danh mục bài viết</th>
        <th colspan="2">Thao tác</th>
      </tr>
      <?php
      $stt = 1;
      while ($row = mysqli_fetch_assoc($result)) :
      ?>
        <tr>
          <td><?= $stt ?></td>
          <td><?= $row['title'] ?></td>
          <td>
            <button type="button" class="btn edit-btn">
              <a href="?page=suadanhmuc&id=<?= $row['id'] ?>"> <i class="fa-regular fa-pen-to-square"></i></a>
            </button>
            <form action="?page=xoadanhmuc" method="post">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <button onclick="return confirm('Bạn muốn xóa danh mục này')" class="btn delete-btn">
                <i class="fa-regular fa-trash-can"></i>
              </button>
            </form>
          </td>
        </tr>
      <?php $stt++;
      endwhile; ?>
    </table>
  </div>
</div>
</main>
</body>

</html>