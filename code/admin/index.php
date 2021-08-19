<?php
require("../Iz_Shower/settings.php");
if (isset($_POST['admin_username'])) {
$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];

echo "<script> alert('Sai tài khoản hoặc Chưa nhập đầy đủ thông tin'); </script>";
if ($admin_username == $admin_user and $admin_password == $admin_pass) {
    header("Location: ./duyet-the.html");
}
// if ($admin_username == $admin_user || $admin_password == $admin_pass) {
//    header("Location: ./duyet-the.php");
// }
// if (!isset($_POST['admin_username']) || !isset($_POST['admin_password'])){
//    echo "<script> alert('Cần nhập đầy đủ thông tin !'); </script>";
// }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng Nhập Admin</title>
        <link type="text/css" rel="stylesheet" href="./css/login.css" />
    </head>
    <body>
        <h1 id="admin-login-title">ĐĂNG NHẬP ADMIN</h1>
        <center>
            <div class="login-border">
            <h3>Đăng nhập Admin</h3>
            <form method="POST">
                <br />
                <label for="admin_username">Tên Tài Khoản :</label>
                <br />
                <br />
                <input type="text" name="admin_username" id="tk" />
                <br />
                <br />
                <label for="admin_password">Mật khẩu :</label>
                <br />
                <br />
                <input type="password" name="admin_password" id="tk" />
                <br />
                <br />
                <button>Đăng Nhập</button>
            </form>
            </div>
        </center>
        <footer>
            <div class="copyright">
                <p>BeluMine Admin : Đoàn Bảo | Design by Đoàn Bảo</p>
            </div>
        </footer>
    </body>
</html>