<?php
session_start();
require_once "../config.php";
require_once "../connect.php";
require_once './functions.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = filterPost("email");
  $password = filterPost("password");
  $check = handelLoginForm($email, $password);

  if (is_array($check)) {
    setMsg("login", "bạn đã đăng nhập thành không ^^^");
    $_SESSION['admin'] = $check;
    header("Location: dashboard.php");
  } else {
    setMsg("login", $check, 'error');
    $alert = displayMsg("login");
  }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .alert {
      position: relative;
      font-size: 18px;
      font-weight: 500;
      padding: 10px 15px;
      width: 100%;
      border-radius: 8px;
      transition: var(--smooth);
    }

    .alert>span {
      position: absolute;
      font-size: 22px;
      cursor: pointer;
      font-weight: 700;
      top: 50%;
      right: 3%;
      transform: translateY(-50%);
    }

    .alert.alert-success {
      color: #0f5132;
      background-color: #d1e7dd;
    }

    .alert.alert-error {
      color: #842029;
      background-color: #f8d7da;
    }
  </style>
  <script defer src="./js/main.js"></script>

  <title>login ADMIN</title>
</head>

<body>

  <form action="" method="post">
    <!-- đăng nhập thất bại -->
    <?= $alert ?? ""; ?>
    <!-- sau khi đang xuất -->
    <?php displayMsg("logout") ?>
    <div class="form-group">
      <label for="">email</label>
      <input type="text" class="" name="email" placeholder="nhập email ....">
    </div>
    <div class="form-group">
      <label for="">mật khẩu</label>
      <input type="text" class="" name="password" placeholder="mật khẩu ....">
    </div>
    <div class="form-group">
      <button>Đăng nhập</button>
    </div>
  </form>
</body>

</html>