<?php



// ============================== RESUE ===========================================

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

function findById($table, $id)
{
    global $con;
    $sql = "SELECT *  FROM $table WHERE id = '$id' LIMIT 1";
    return mysqli_query($con, $sql);
}

function getAll($table, $option = ['*'])
{
    global $con;
    $col = implode(',', $option);
    $sql = "SELECT $col  FROM $table";
    $reuslt = mysqli_query($con, $sql);
    return mysqli_fetch_all($reuslt, MYSQLI_ASSOC);
}


function insert($table, $col, $value)
{
    global $con;
    $col = implode(",", $col);
    $value = implode("','", $value);
    $sql = "INSERT INTO `$table` ($col) VALUES ('$value')";
    return mysqli_query($con, $sql);
}
function updated($table, $values, $condition)
{
    global $con;
    $sql = "UPDATE  `$table` set $values WHERE $condition";
    return  mysqli_query($con, $sql);
}

/**
 * test comment function ahihih ^^^
 * @author Huỳnh ANH TUẤN
 * @param string   $table là bảng
 * @param array  $condition là điều kiện mặc định là *
 * @param string  $limit lấy số record trả về từ câu truy vấn
 * @return object trả về 1 đối tượng query
 */
function getWhere($table, $condition, $col = ['*'], $limit = "")
{
    global $con;
    $col = implode(',', $col);
    $sql = "SELECT  $col FROM $table where $condition " . (!empty($limit) ? "LIMIT " . $limit : "");
    return mysqli_query($con, $sql);
}



function test()
{

    return 1;
}





// message SESSION


function setMsg($name, $msg, $type = "success")
{
    if (!isset($_SESSION["flash_message"]));
    $_SESSION["flash_message"][$name] = [
        "msg" => $msg,
        "type" => $type,
    ];
}



function displayMsg($name)
{
    if (!isset($_SESSION["flash_message"][$name])) return;
    $flash = $_SESSION["flash_message"][$name];
    unset($_SESSION["flash_message"][$name]);


    echo sprintf("<div class='alert alert-%s'><span>&#10005;</span>%s</div>", $flash['type'], $flash['msg']);
}
// ================================ END RESUE ===========================================


function handelLoginForm($email, $password)
{
    if (empty($email) or  empty($password)) {
        return "Vui lòng nhập đầy đủ thông tin !";
    }

    $reuslt = getWhere("admin", "email = '$email'");
    if ($reuslt->num_rows == 0) {
        return "Tài khoản không chính xác !";
    }

    $reuslt = $reuslt->fetch_assoc();
    $email = $reuslt['email'];
    $passwordHas = $reuslt['password'];

    if (password_verify($password, $passwordHas)) {
        return  $reuslt = [
            "username" => $reuslt['username'],
            "avatar" => $reuslt['avatar'],
        ];
    } else {
        return "Đăng nhập không thành công";
    }
}



function handleFileUpload($file, $option = "post")
{



    $fileName = $file['name'];

    if ($file['error'] != UPLOAD_ERR_OK)  return   "File tải lên không thành công";

    $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    if (!in_array($fileExtension, $extensions)) return   "Vui lòng chọn file ảnh ^^";

    $size = 1024 * 1024 * 4;
    if ($file['size'] > $size) return   "Dung lượng ảnh không được quá 4mb ^^";


    // nếu hôm nay chưa co forder d/m/Y thì tạo =>
    $folder = "../uploads/" . $option . "/" . date("d-m-Y", time());

    if (!file_exists($folder)) {
        mkdir($folder, 0777);
    }

    // trùng name thì thêm 'copy' thôi =>
    if (file_exists("$folder/$fileName")) {
        $fileNameNew = "$folder/" . pathinfo($fileName, PATHINFO_FILENAME) . "(copy)." . pathinfo($fileName, PATHINFO_EXTENSION);
        rename("$folder/$fileName", $fileNameNew);
    }
    move_uploaded_file($file['tmp_name'], "$folder/$fileName");
    $fileNew[] = "$folder/$fileName";
    return $fileNew;
}
