<?php
session_start();
require_once "../config.php";
require_once "../connect.php";
require_once './functions.php';


// nếu đã đăng nhập ròi thì 
// dô trang ADMIN luôn vào trang login làm gì
if (isset($_SESSION['admin'])) {
  header("Location: dashboard.php");
}
//==========================================

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  // lấy mk người dùng nhập mã hóa MD5
  $password = md5($_POST['password']);

  $error = "";
  if (empty($email) or empty($password)) {
    $error = "Vui lòng nhập email or password";
  } else {

    $sql = "SELECT * FROM `admin` WHERE email = '$email' and password = '$password' ";

    // doi toi result
    $result = mysqli_query($con, $sql);

    // reuslt là đối tượng của hàm mysql query ;
    // num_rows là thuộc tính 
    if ($result->num_rows > 0) {
      $kq =  mysqli_fetch_array($result);
      $_SESSION['admin'] = [
        "username" => $kq['username'],
        "avatar" => $kq['avatar'],
      ];
      header("Location: dashboard.php");
    } else {
      $error = "Tài khoản hoặc mật khẩu không chính xác";
    }
  }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/login.css">
  <title>Login ADMIN</title>
</head>

<body>
  <div class="login-card">
    <h2>Login</h2>
    <h3>Enter your credentials</h3>
    <div class="error-msg"><?= !empty($error) ? $error : "" ?></div>
    <form class="login-form" method="POST">
      <input name="email" spellcheck="false" class="control" type="email" placeholder="Email" />
      <div class="password">
        <input name="password" spellcheck="false" class="control" id="password" type="password" placeholder="Password" />
        <button class="toggle" type="button" onclick="togglePassword(this)"></button>
      </div>
      <button class="control" type="submit">LOGIN</button>
    </form>
  </div>
</body>
<script src="./js/login.js"></script>

</html>