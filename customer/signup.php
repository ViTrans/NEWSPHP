<?php
include './func/connect.php';
$err = [];
$folder_path = '../uploads/';
$file_path =  $folder_path . basename($_FILES['avatar']['name']);
$flag_ok = true;
$file_type = strtolower(pathinfo($file_path,PATHINFO_EXTENSION));
if(isset($_POST["username"])) {
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
        $flag_ok = true;
      
    } else {
      echo "File is not an image.";
        $flag_ok = false;
      
    }
  }
$ex = array('jpg','png','jpeg');
if(!in_array($file_type,$ex)){
    $err['avatar'] = 'File không đúng định dạng';
    $flag_ok = false;
}
if($_FILES['avatar']['size'] > 900000){
    $err['avatar'] = 'File quá lớn';
    $flag_ok = false;
}
if($flag_ok){
    move_uploaded_file($_FILES['avatar']['tmp_name'],$file_path);
}
if(isset($_POST['username'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rpassword = $_POST['rpassword'];

//   $birthday = $_POST['birthday'];
  $gender = $_POST['gender'];
  if(empty($username)){
    $err['username'] = 'vui lòng nhập tên tài khoản';
  }
  if(empty($email)){
    $err['email'] = 'vui lòng nhập email';
  }
  if(empty($password)){
    $err['password'] = 'vui lòng nhập mật khẩu';
  }
//   if(empty($birthday)){
//     $err['birthday'] = 'vui lòng nhập ngày sinh';
//   }
  if($password != $rpassword){
    $err['rpassword'] = 'mật khẩu nhập lại không đúng';
  }
    if(empty($err)){
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`id`, `email`, `username`, `password`, `gender`, `status`, `avatar`) VALUES (NULL, '$email', '$username', '$pass', '$gender', '0', '');";
      $query = mysqli_query($con, $sql);
      if($query){
        header("Location: ./login.php");
      }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Ký</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/signup.css" />
</head>

<body>
    <?php
    include 'header.php';
?>
    <main>
        <section class="login container">
            <div class="signup-main">
                <h3 class="headding">Đăng Ký</h3>
                <form class="form-sign" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                    <div class="text-field">
                        <label for="username">Tên Tài Khoản</label>
                        <input name="username" autocomplete="off" type="text" id="username"
                            placeholder="Nhập Tên Tài Khoản" />
                        <span class="error"><?php echo (isset($err['username']))? $err['username'] : '' ?></span>
                    </div>
                    <div class="text-field">
                        <label for="email">Email</label>
                        <input name="email" autocomplete="off" type="email" id="email" placeholder="Nhập email" />
                        <span class="error"><?php echo (isset($err['email']))? $err['email'] : '' ?></span>
                    </div>
                    <div class="text-field">
                        <label for="password">Mật Khẩu</label>
                        <input name="password" autocomplete="off" type="password" id="password"
                            placeholder="Nhập Mật Khẩu" />
                        <span class="error"><?php echo (isset($err['password']))? $err['password'] : '' ?></span>
                    </div>
                    <div class="text-field">
                        <label for="rpassword">Nhập Lại Mật Khẩu</label>
                        <input name="rpassword" autocomplete="off" type="password" id="rpassword"
                            placeholder="Nhập Lại Mật Khẩu" />
                        <span class="error"><?php echo (isset($err['rpassword']))? $err['rpassword'] : '' ?></span>
                    </div>
                    <div class="text-field">
                        <label for="birthday">Ngày Sinh</label>
                        <input name="birthday" autocomplete="off" type="date" id="birthday"
                            placeholder="Nhập Ngày Sinh" />
                        <span class="error"><?php echo (isset($err['birthday']))? $err['birthday'] : '' ?></span>
                    </div>
                    <div class="text-field">
                        <input type="file" name="avatar" />
                        <?php echo (isset($err['avatar']))? $err['avatar'] : '' ?>
                    </div>
                    <div class="text-field">
                        <label for="gender">Giới Tính</label>
                        <select name="gender" id="">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                        <button type="submit">Đăng Ký</button>
                </form>
            </div>
        </section>
    </main>
    <?php
    include 'footer.php';
?>
</body>

</html>