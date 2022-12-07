<?php
// login 
// include './func/connect.php';
// include './func/funcs.php';
// $re = getCategory($con);
// session_start();
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
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
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
<section class="login container">
    <div class="login-main">
        <h3 class="headding">Đăng Nhập</h3>
        <form class="form-sign" action="" method="POST">
            <div class="text-field">
                <label for="email">Nhập email tài khoản</label>
                <input name="email" autocomplete="off" type="email" id="email" placeholder="Nhập Tên Tài Khoản" />
                <span class="error"><?php echo (isset($err['email']))? $err['email'] : '' ?></span>
            </div>
            <div class="text-field">
                <label for="password">Mật Khẩu</label>
                <input name="password" autocomplete="off" type="password" id="password" placeholder="Nhập Mật Khẩu" />
                <span class="error"><?php echo (isset($err['password']))? $err['password'] : '' ?></span>
            </div>
            <button id="login" type="submit">Đăng Nhập</button>
        </form>
    </div>
    <div class="login_main-right">
        <h3 class="headding">Đăng Ký</h3>
        <p class="signup-desc">
            Nếu quý khách vẫn chưa có tài khoản trên shop của chúng tôi hãy thử
            sử dụng tùy chọn này để đăng ký tài khoản mới.
        </p>
        <div>
            <a href="?url=signup.php">
                <button type="submit">Đăng Ký</button>
            </a>
        </div>
    </div>
</section>
</main>