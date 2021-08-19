<?php
// PHP 5.6 - CPanel Editor
// Một số code không thể chạy trên phiên bản 7.0 trở lên.
// Khuyến khích phiên bản 5.6 để chạy code này
// By Đoàn Bảo
?>
<?php
include("Iz_Shower/db-config.php");
if(isset($_POST['submit'])) {
        if(!isset($_POST['username']) || !isset($_POST['card_type']) || !isset($_POST['card_amount']) || !isset($_POST['card_serial']) || !isset($_POST['card_code'])) {
            $err = '<script>alert("Bạn cần nhập đầy đủ thông tin !"); </script>';
            echo $err;
        }else{
            $name = $_POST['username'];
            $card_type = $_POST['card_type'];
            $card_amount = $_POST['card_amount'];
            $card_serial = $_POST['card_serial'];
            $card_code = $_POST['card_code'];
            
            if($name == '' || $card_type == '' || $card_amount == '' || $card_serial == '' || $card_code == '') {
                $err = '<script>alert("Bạn cần nhập đầy đủ thông tin !"); </script>';
                echo $err;
            
            //if(strlen($type) < 6 || strlen($type) > 30 || strlen($amount) < 6|| strlen($amount) > 30){
                // $err = 'Bạn cần nhập 10 > 20 kí tự';
            }else{
                include 'Iz_Shower/db-config.php'; 
            $check = mysql_result(mysql_query("SELECT COUNT(*) FROM `gachthe` WHERE `code`='$card_code' AND `serial`='$card_serial'"), 0);
				if(empty($card_code) || empty($card_serial)) {
				$err = '<script>alert("Bạn cần nhập đầy đủ thông tin !"); </script>';
				echo $err;
				}else{ if($check >= 1){
				    $err = '<script>alert("Đã tồn tại thẻ này !"); </script>';
				}else{
				$name = $_POST['username'];  
				$tr = 'Đợi duyệt';
			mysql_query("INSERT INTO `gachthe` (`code`, `serial`, `menhgia`, `loaithe`, `uid`, `tinhtrang`) VALUES ('".$card_code."','".$card_serial."','".$card_amount."','".$card_type."','".$name."','".$tr."')");
				$err = '<script>alert("Thẻ của bạn đang đợi duyệt ! Point sẽ được gửi sau !"); </script>';
				echo $err;
				}
				}
            }
        }
    }
?>
<?php
require("Iz_Index/head.php");
?>
<center>
    <br />
    <p id="all-p-card">- CONTENT -</p>
    <div class="border-content">
        <h1 id="title">NẠP THẺ</h1>
        <p id="description">Nạp thẻ chậm tại đây, nạp xong hãy đợi trong 5 - 10 phút (chậm).</p>
        <form method="POST">
            <br />
            <label for="username">Tên Người Chơi :</label>
            <br />
            <input type="text" name="username" />
            <br />
            <label for="card_type">Loại thẻ :</label>
            <br />
            <select name="card_type">
              <option value="Viettel">Viettel</option>
              <option value="Vinaphone">Vinaphone</option>
              <option value="Mobifone">Mobifone</option>
              <option value="VietnamMobile">VietnamMobile</option>
              <option value="Garena">Garena (Không nhận)</option>
            </select>
            <br />
            <label for="card_amount">Mệnh giá :</label>
            <br />
            <select name="card_amount">
              <option value="10000">10,000đ</option>
              <option value="20000">20,000đ</option>
              <option value="30000">30,000đ</option>
              <option value="50000">50,000đ</option>
              <option value="100000">100,000đ</option>
              <option value="200000">200,000đ</option>
              <option value="300000">300,000đ</option>
              <option value="500000">500,000đ</option>
            </select>
            <br />
            <label for="card_code">Mã thẻ :</label>
            <br />
            <input type="text" name="card_code" />
            <br />
            <label for="card_serial">Số Serial :</label>
            <br />
            <input type="text" name="card_serial" />
            <br />
            <br />
            <i>Bấm vào đây để gửi thẻ : </i>
            <br />
            <button type="submit" name="submit" id="btn-gui-the">Gửi thẻ</button>
        </form>
    </div>
    <br />
</center>
<center>
            <b id="all-b-card">- PLAYER CONTENT -</b>
            <div class="content-player">
            <img src="<?php echo $logo_server; ?>" height="50px" weight="50px" alt="<?php echo $servername; ?>" />
            <br />
            <b id="players"><?php echo $line1; ?></b>
              <br />
              <p id="is-player-card"><?php echo $line2; ?></p>
              <!-- <p id="is-player-card">Hiện tại có 0/100 người đang tham gia máy chủ ! Tham gia ngay nào !</p> -->
              <!-- Note: Chỉ cần đổi ip và port là được :D -->
            </div>
        </center>
        <style>
            #btn-gui-the {
                font-family: Arial;
                font-size: 24px;
                background: lime;
                border: 1px solid brown;
                color: white;
                font-weight: bold;
                margin: 2px;
                padding: 10px;
            }
        </style>
<?php
require("Iz_Index/end.php");
?>