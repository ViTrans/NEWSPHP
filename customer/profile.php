<?php
$id = $_SESSION['user']['id'];
$re = getProfile($con,$id);
$row = mysqli_fetch_assoc($re);
$err = [];
// edit profile
if(isset($_POST['username'])){
    $folder_path = '../uploads/';
    $file_path =  $folder_path . basename($_FILES['avatar']['name']);
    $flag_ok = true;
    $file_type = strtolower(pathinfo($file_path,PATHINFO_EXTENSION));
    if(isset($_POST["avatar"])) {
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if($check !== false) {
        //   echo "File is an image - " . $check["mime"] . ".";
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
    }
    // update profile
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $avatar = $_FILES['avatar']['name'];
        $birthday = $_POST['birthday'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $sql = "UPDATE users SET username = '$username', email = '$email', avatar = '$avatar', birthday = '$birthday', password = '$password' WHERE id = '$id'";
        $re = mysqli_query($con,$sql);
        if($re){
            $_SESSION['user']['username'] = $username;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['avatar'] = $avatar;
            $_SESSION['user']['birthday'] = $birthday;
            $_SESSION['user']['password'] = $password;
            header('location:?url=profile.php&id='.$id);
        }
    }
?>
<main>
    <section class="login container">
        <div class="profile-main">
            <h3 class="headding">Thông Tin Cá Nhân</h3>
            <form class="form-profile" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                <?php if(isset($_SESSION['user'])): ?>
                <div class="text-field">
                    <label for="username">Tên Tài Khoản</label>
                    <input name="username" autocomplete="off" type="text" id="username" placeholder="Nhập Tên Tài Khoản"
                        value="<?php echo $row['username'] ?>" />
                    <span class="error"><?php echo (isset($err['username']))? $err['username'] : '' ?></span>
                </div>
                <div class="text-field">
                    <label for="email">Email</label>
                    <input name="email" autocomplete="off" type="email" id="email" placeholder="Nhập email"
                        value="<?php echo $row['email']?>" />
                    <span class="error"><?php echo (isset($err['email']))? $err['email'] : '' ?></span>
                </div>
                <div class="text-field">
                    <label for="password">Mật Khẩu</label>
                    <input name="password" autocomplete="off" type="password" id="password" placeholder="Nhập Mật Khẩu"
                        value="<?= $row['password']?>" />
                    <span class="error"><?php echo (isset($err['password']))? $err['password'] : '' ?></span>
                </div>
                <!-- <div class="text-field">
                    <label for="rpassword">Nhập Lại Mật Khẩu</label>
                    <input name="rpassword" autocomplete="off" type="password" id="rpassword"
                        placeholder="Nhập Lại Mật Khẩu" />
                    <span class="error"><?php echo (isset($err['rpassword']))? $err['rpassword'] : '' ?></span>
                </div> -->
                <div class="text-field">
                    <label for="birthday">Ngày Sinh</label>
                    <input name="birthday" autocomplete="off" type="date" id="birthday" placeholder="Nhập Ngày Sinh"
                        value="<?php echo $row['birthday']?>" />
                    <span class="error"><?php echo (isset($err['birthday']))? $err['birthday'] : '' ?></span>
                </div>
                <div class="text-field">
                    <label for="avatar">Ảnh Đại Diện</label>
                    <input type="file" name="avatar" value="<?php echo $row['avatar']?>" />
                    <input type="hidden" name="cloneavatar" value="<?php echo $row['avatar']?>" />
                    <?php echo (isset($err['avatar']))? $err['avatar'] : '' ?>
                </div>
                <!-- <div class="text-field">
                    <label for="gender">Giới Tính</label>
                    <select name="gender" id="">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div> -->
                <button type="submit">Cập Nhật</button>
            </form>
            <?php endif; ?>
        </div>
    </section>
</main>