<?php




function redirect($path)
{
    echo "<script>window.location.href ='$path' </script>";
    die;
}




function filterPost($name)
{
    return  filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS);
}

function filterGet($name)
{
    return  filter_input(INPUT_GET, $name, FILTER_SANITIZE_SPECIAL_CHARS);
}


function validateInputInt($name, $input = true, $min = 1, $max = 10000)
{

    if ($input) {
        return filter_input(INPUT_POST, $name, FILTER_VALIDATE_INT, ["options" => ["min_ranger" => $min, "max_ranger" => $max]]);
    }
    return
        filter_input(INPUT_GET, $name, FILTER_VALIDATE_INT, ["options" => ["min_ranger" => $min, "max_ranger" => $max]]);
}

$caterogies = ["danhsachdanhmuc", "suadanhmuc", "themdanhmuc"];
$posts = ["suabaiviet", "thembaiviet", "danhsachbaiviet"];
$users = ["danhsachnguoidung"];



function activeLink($arr = [])
{
    global $page;
    if (empty($arr)) return;

    if (in_array($page, $arr)) return "active";

    return;
}

// ============================================ END Filter input =================================================





// thao tác với CSDL




function insert($table, $data = [])
{
    global $con;


    $col = implode(",", array_keys($data));
    $values = implode("','", $data);
    $sql = "INSERT INTO `$table` ($col) VALUES ('$values')";
    mysqli_query($con, $sql);
    return $con->affected_rows;
}

function updated($table, $data = [], $condition = "1 = 1")
{
    global $con;

    $keyValues = [];
    foreach ($data as $key => $value) {
        $keyValues[] = $key . "=" . "'$value'";
    }

    $fileds = implode(',', $keyValues);
    $sql = "UPDATE  `$table` set $fileds WHERE $condition";
    mysqli_query($con, $sql);
    return $con->affected_rows;
}

function select(
    $table = [],
    $select = ['*'],
    $condition = 1,
    $orderBy = [
        "id" => "DESC"
    ],
    $limit = ""
) {
    global $con;

    $select = implode(',', $select);
    $table = implode(',', $table);

    $dataSort = [];
    foreach ($orderBy as $col => $sort) {
        $dataSort[] = $col . " " . $sort;
    };
    $dataSort = implode(",", $dataSort);

    $sql = "SELECT  $select FROM $table where $condition ORDER BY  $dataSort" . (!empty($limit) ? "LIMIT " . $limit : "");

    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}



// FLASH MSG

function setMsg($name, $msg, $type = "success")
{
    $_SESSION["flash_message"][$name] = [
        "msg" => $msg,
        "type" => $type,
    ];
}



function displayMsg($name)
{
    if (!isset($_SESSION["flash_message"][$name])) {
        return;
    };

    $flash = $_SESSION["flash_message"][$name];
    unset($_SESSION["flash_message"][$name]);


    echo sprintf("<div class='alert alert-%s'><span>&#10005;</span>%s</div>", $flash['type'], $flash['msg']);
}


// function handelLoginForm($email, $password)
// {   
//     if (empty($email) or  empty($password)) {
//         return "Vui lòng nhập đầy đủ thông tin !";
//     }

//     $reuslt = getWhere("admin", "email = '$email'");
//     if ($reuslt->num_rows == 0) {
//         return "Tài khoản không chính xác !";
//     }

//     $reuslt = $reuslt->fetch_assoc();
//     $email = $reuslt['email'];
//     $passwordHas = $reuslt['password'];

//     if (password_verify($password, $passwordHas)) {
//         return  $reuslt = [
//             "username" => $reuslt['username'],
//             "avatar" => $reuslt['avatar'],
//         ];
//     } else {
//         return "Đăng nhập không thành công";
//     }
// }



function handleFileUpload($file, $option = "post")
{



    $fileName = $file['name'];

    if ($file['error'] != UPLOAD_ERR_OK)  return   "File tải lên không thành công";

    $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($fileExtension, $extensions)) return   "Vui lòng chọn file ảnh ^^";

    $size = 1024 * 1024 * 4;
    if ($file['size'] > $size) return   "Dung lượng ảnh không được quá 4mb ^^";


    $folder = "../uploads/" . $option . "/" . date("d-m-Y", time());



    if (!file_exists($folder)) {
        mkdir($folder, 0777);
    }

    // trùng name 
    if (file_exists("$folder/$fileName")) {
        $fileNameNew = "$folder/" . pathinfo($fileName, PATHINFO_FILENAME) . "(copy)." . pathinfo($fileName, PATHINFO_EXTENSION);
        $fileNew[] = $fileNameNew;
        move_uploaded_file($file['tmp_name'], $fileNameNew);
    } else {
        move_uploaded_file($file['tmp_name'], "$folder/$fileName");
        $fileNew[] = "$folder/$fileName";
    }

    return $fileNew;
}

function  getCurrentDateTime()
{
    return date("Y-m-d H:i:s", time());
}

function filterData($name)
{
    if (!isset($_SESSION[$name])) {
        return;
    }

    $sql = "";
    foreach ($_SESSION[$name] as $field => $value) {
        if ($field == "name") {
            if ($value) {
                $sql = "tensp LIKE '%$value%' ";
            }
        } else {
            if ($value) {
                $sql .= (!empty($sql) ? "and " : "") . "loaihang.id = '$value'";
            }
        }
    }
    return $sql;
}

function query($sql)
{
    global $con;
    return mysqli_query($con, $sql);
}



// thống kê 

function getTotalPosts()
{
    global $con;
    $sql = "SELECT COUNT(*) as baiviet from posts where status = 1";
    return mysqli_query($con, $sql);
}

function getTotalCategories()
{
    global $con;
    $sql = "SELECT COUNT(*) as danhmuc from category where status = 1";
    return mysqli_query($con, $sql);
}
function getTotalComments()
{
    global $con;
    $sql = "SELECT COUNT(*) as binhluan from comments";
    return mysqli_query($con, $sql);
}
function getThanhVienDangKy()
{
    global $con;
    $sql = "SELECT COUNT(*) as thanhvien from users";
    return mysqli_query($con, $sql);
}
function getTotalPostFeatured()
{
    global $con;
    $sql = "SELECT COUNT(*) as baivietnoibat from posts where status = 1 and featured = 1";
    return mysqli_query($con, $sql);
}

function getAllUsers()
{
    global $con;
    $sql = "SELECT * from users";
    return mysqli_query($con, $sql);
}
