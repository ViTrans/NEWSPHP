<?php

$result = getWhere("users", "status = 1 ORDER BY id desc");
?>
<div class="content">
    <div class="section-heading">
        <h2>Danh sách Thành viên</h2>
        <?php displayMsg("del_user") ?>
    </div>
    <div class="data-listtings">
        <table>

            <tr>
                <th>#</th>
                <th>Ảnh</th>
                <th>Tên thành viên</th>
                <th>Email</th>
                <th colspan="2">Thao tác</th>
            </tr>
            <?php
            $stt = 1;
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <tr>
                    <td><?= $stt ?></td>
                    <td>tên ảnh</td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['gender'] == 1 ? "Nam" : "Nữ" ?></td>
                    <td>
                        <form action="?page=xoathanhvien" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button onclick="return confirm('Bạn có muốn xóa thành viên này')" class="btn delete-btn">
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