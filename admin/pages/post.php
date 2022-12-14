<?php


if (isset($_POST['filter'])) {
    $_SESSION['filter'] = [
        "title" => $_POST['title'],
        "cate_id" => $_POST['cate_id']
    ];
    redirect("?page=danhsachbaiviet");
}



if (!empty($_SESSION['filter'])) {
    $sql1 = "";

    foreach ($_SESSION['filter'] as $key => $value) {
        if (!empty($value)) {
            switch ($key) {
                case 'title':
                    $sql1 .=   "posts.title " . "LIKE " . "'%" . $value . "%' ";
                    break;
                case 'cate_id':
                    if (!empty($sql1)) {
                        $sql1 .= "and category.id = " . $value;
                    } else {
                        $sql1 .=  "category.id = " . $value;
                    }
                    break;
            }
        }
    }
}


$per_page = 4;



$current_page = $_GET['p'] ?? 1;
$offset =  ($current_page - 1) * $per_page;







if (empty($sql1)) {
    $sql = "SELECT posts.*,category.title as cate_title  from category,posts  where
 category.status = 1 and posts.status = 1 and category.id = posts.category_id 
  ORDER BY posts.id desc LIMIT $per_page OFFSET $offset";

    $queryTotalPosts = "SELECT posts.*,category.title as cate_title  from category,posts  where
 category.status = 1 and posts.status = 1 and category.id = posts.category_id 
  ORDER BY posts.id desc";
} else {

    $sql = "SELECT posts.*,category.title as cate_title  from category,posts  where " . $sql1 . " and
 category.status = 1 and posts.status = 1 and category.id = posts.category_id 
  ORDER BY posts.id desc LIMIT $per_page OFFSET $offset";

    $queryTotalPosts = "SELECT posts.*,category.title as cate_title  from category,posts  where " . $sql1 . "
 and category.status = 1 and posts.status = 1 and category.id = posts.category_id 
  ORDER BY posts.id desc";
}

$toTalRows = mysqli_query($con, $queryTotalPosts)->num_rows;






$toTalPages = ceil($toTalRows / $per_page);
$result  = mysqli_query($con, $sql);

$categories = select(["category"], ['*'], 'status = 1');

?>




<div class="content">
    <?php displayMsg("created_post") ?>
    <?php displayMsg("del_post") ?>
    <?php displayMsg("edit_post") ?>
    <div class="section-heading">
        <h2>Danh sách bài viết</h2>

        <button><a href="?page=thembaiviet">Thêm bài viết</a></button>
    </div>
    <div class="filter_posts">
        <form action="" class="post-form" method="POST">
            <input value="<?= $_SESSION['filter']['title'] ?? "" ?>" class="" name="title" type="text" placeholder="Tên bài viết..." />
            <select name="cate_id">
                <option value="">[--Chọn tên danh mục--]</option>
                <?php foreach ($categories as  $row) :
                ?>
                    <option <?= isset($_SESSION['filter']['cate_id']) &&
                                ($_SESSION['filter']['cate_id'] === $row['id']) ? "selected" : "" ?> value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                <?php endforeach; ?>
            </select>
            <button name="filter">Lọc</button>
        </form>
    </div>
    <div class="data-listtings">
        <table>

            <tr>
                <th>#</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Tên bài viết</th>
                <th>Ngày tạo</th>
                <th colspan="2">Thao tác</th>
            </tr>
            <?php
            $stt = 1;
            foreach ($result as $row) :
            ?>
                <tr>
                    <td><?= $stt ?></td>
                    <td><img src="<?= $row['img'] ?>"></td>
                    <td><?= $row['cate_title'] ?></td>
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
            endforeach; ?>
        </table>
    </div>
    <?php require "./layouts/pagination.php"; ?>
</div>
</main>

</body>

</html>