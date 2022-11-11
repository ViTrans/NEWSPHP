<?php

$result =
    getWhere("posts,category", "posts.category_id = category.id AND posts.status = 1 ORDER BY id desc", ['posts.*', 'category.title  as cateName']);
?>
<div class="content">
    <div class="section-heading">
        <h2>Danh sách bài viết</h2>
        <?php displayMsg("created_post") ?>
        <?php displayMsg("del_post") ?>
        <?php displayMsg("edit_post") ?>
        <button><a href="?page=thembaiviet">Thêm bài viết</a></button>
    </div>
    <div class="data-listtings">
        <table>

            <tr>
                <th>#</th>
                <th>Ảnh</th>
                <th>Danh sách bài viết</th>
                <th>Tên bài viết</th>
                <th>Ngày tạo</th>
                <th colspan="2">Thao tác</th>
            </tr>
            <?php
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <tr>
                    <td><?= $stt ?></td>
                    <td><img src="<?= $row['img'] ?>"></td>
                    <td><?= $row['cateName'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= date("d-m-Y", strtotime($row['created_at'])) ?></td>
                    <td>
                        <button type="button" class="btn edit-btn">
                            <a href="?page=suabaiviet&id=<?= $row['id'] ?>"> <i class="fa-regular fa-pen-to-square"></i></a>
                        </button>
                        <form action="?page=xoabaiviet" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button onclick="return confirm('Bạn có chắc xóa bài viết này')" class="btn delete-btn">
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