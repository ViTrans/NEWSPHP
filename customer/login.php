<?php
// login 
include './func/connect.php';
session_start();
$err = []; // tạo mảng lưu lỗi
if(isset($_POST['email'])){ // kiểm tra xem có click vào nút đăng ký hay không
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(empty($email)){
    $err['email'] = 'vui lòng nhập email';
  }
  if(empty($password)){
    $err['password'] = 'vui lòng nhập mật khẩu';
  }
  if(empty($err)){ // nếu mảng lỗi rỗng thì thực hiện đăng ký
    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkEmail = mysqli_num_rows($query);
    if($checkEmail == 1){
        $checkPass = password_verify($password, $data['password']);
      if($checkPass == true){
        $_SESSION['user'] = $data;
        header("Location: index.php");
    }
    }
    else{
      $err['email'] = 'email không tồn tại';
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
    <title>Đăng Nhập</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/login.css" />
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main>
        <section class="login container">
            <div class="signin-main">
                <h3 class="headding">Đăng Nhập</h3>
                <form class="form-sign" action="" method="POST">
                    <div class="text-field">
                        <label for="email">Nhập email tài khoản</label>
                        <input name="email" autocomplete="off" type="email" id="email"
                            placeholder="Nhập Tên Tài Khoản" />
                        <span class="error"><?php echo (isset($err['email']))? $err['email'] : '' ?></span>
                    </div>
                    <div class="text-field">
                        <label for="password">Mật Khẩu</label>
                        <input name="password" autocomplete="off" type="password" id="password"
                            placeholder="Nhập Mật Khẩu" />
                        <span class="error"><?php echo (isset($err['password']))? $err['password'] : '' ?></span>
                    </div>
                    <button id="login" type="submit">Đăng Nhập</button>
                </form>
            </div>
            <div class="signup-main">
                <h3 class="headding">Đăng Ký</h3>
                <p class="signup-desc">
                    Nếu quý khách vẫn chưa có tài khoản trên shop của chúng tôi hãy thử
                    sử dụng tùy chọn này để đăng ký tài khoản mới.
                </p>
                <div>
                    <a href="signup.php">
                        <button type="submit">Đăng Ký</button>
                    </a>
                </div>
            </div>
        </section>
    </main>
    <?php
    include 'footer.php';
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/main.js"></script>
</body>

</html>