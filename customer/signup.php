<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Ký</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
          <form class="form-sign" action="" method="POST" autocomplete="off">
            <div class="text-field">
              <label for="username">Tên Tài Khoản</label>
              <input
                name="username"
                autocomplete="off"
                type="text"
                id="username"
                placeholder="Nhập Tên Tài Khoản"
              />
              <span class="error"><?php echo (isset($err['username']))? $err['username'] : '' ?></span>
            </div>
            <div class="text-field">
              <label for="email">Email</label>
              <input
                name="email"
                autocomplete="off"
                type="email"
                id="email"
                placeholder="Nhập email"
              />
              <span class="error"><?php echo (isset($err['email']))? $err['email'] : '' ?></span>
            </div>
            <div class="text-field">
              <label for="password">Mật Khẩu</label>
              <input
                name="password"
                autocomplete="off"
                type="password"
                id="password"
                placeholder="Nhập Mật Khẩu"
              />
              <span class="error"><?php echo (isset($err['password']))? $err['password'] : '' ?></span>
            </div>
            <div class="text-field">
              <label for="rpassword">Nhập Lại Mật Khẩu</label>
              <input
                name="rpassword"
                autocomplete="off"
                type="password"
                id="rpassword"
                placeholder="Nhập Lại Mật Khẩu"
              />
              <span class="error"><?php echo (isset($err['rpassword']))? $err['rpassword'] : '' ?></span>
            </div>
            <div class="text-field">
              <label for="phone">Số Điện Thoại</label>
              <input
                name="phone"
                autocomplete="off"
                type="number"
                id="phone"
                placeholder="Nhập Số Điện Thoại"
              />
              <span class="error"><?php echo (isset($err['phone']))? $err['phone'] : '' ?></span>
            </div>
            <div class="text-field">
              <label for="address">Địa Chỉ</label>
              <input
                name="address"
                autocomplete="off"
                type="text"
                id="address"
                placeholder="Nhập Địa Chỉ"
              />
              <span class="error"><?php echo (isset($err['address']))? $err['address'] : '' ?></span>
            </div>
            <div class="text-field">
              <label for="birthday">Ngày Sinh</label>
              <input
                name="birthday"
                autocomplete="off"
                type="date"
                id="birthday"
                placeholder="Nhập Ngày Sinh"
              />
              <span class="error"><?php echo (isset($err['birthday']))? $err['birthday'] : '' ?></span>
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