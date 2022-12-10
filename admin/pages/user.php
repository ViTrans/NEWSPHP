<!-- show list users -->
<?php
$users = getAllUsers();

?>
<div class="content">
    <div class="section-heading">
        <h2>Danh Sách Thành Viên</h2>
        <?php displayMsg("login") ?>
    </div>
    <div class="data-listtings">
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ngày Sinh</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $i = 1;
                foreach ($users as $user) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= date_format(
                        date_create($user['birthday']),
                        "d/m/Y")?></td>
                        <td>
                            <?php
                        if ($user['status'] == 1) {
                            echo "Hoạt động";
                        } else {
                            echo "Khóa";
                        }
                        ?>
                        </td>
                        <td>
                            <form action="?page=suanguoidung" method="post">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button onclick="return confirm('Bạn muốn khôi phục người dùng này')"
                                    class="btn edit-btn">
                                    <i class="fa-solid fa-unlock"></i>
                                </button>
                            </form>
                            <form action="?page=xoanguoidung" method="post">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <button onclick="return confirm('Bạn muốn xóa người dùng này')" class="btn delete-btn">
                                    <i class="fa-solid fa-lock"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>