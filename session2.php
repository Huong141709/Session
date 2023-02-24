<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<title>Thông tin khách hàng</title>
<link rel="stylesheet" href="cookies.css">
<style>
    #forml{
            padding-left: 400px;
            padding-top:30px;
            width: 400px;
    }
    .tinhtien{
        background: greenyellow ;
        position: relative;
        top:22px;
    }
    .tinhtienh1{
        font-family: 'Times New Roman', Times, serif;
    }
    .hienthi{
            background-color:Azure;
            width: 380px;
            height: 150px;
            margin-left: 400px;
            padding-top:20px;
            padding-left: 20px;
            padding-top: 20px;

    .body{
        background: #FFFFCC;
        padding-left:20px  ;
        padding-bottom: 10px ;
        width: 500px;
    }
    .input{
        border-radius: 10px;
        height: 20px;
        left: 20px;
    }
    .bt1{
        border-radius:10px;
    }
</style>
</head>
<body>
    <?php 
        ini_set('display_errors', 0);
        session_start(); // bắt đầu session
        if (!empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['add']) && !empty($_POST['phone'])) { // lưu thông tin khách hàng vào mảng
            $khach_hang = array(
                'name' => $_POST['name'],
                'mail' => $_POST['mail'],
                'add' => $_POST['add'],
                'phone' => $_POST['phone']
            );
            // kiểm tra xem mảng "khach_hang" đã tồn tại trong session hay chưa
            if (!isset($_SESSION['khach_hang'])) {
                $_SESSION['khach_hang'] = array();
            };
            array_push($_SESSION['khach_hang'], $khach_hang); //thêm thông tin khách hàng vào mảng "khach_hang" trong session
        };
        foreach ($_SESSION['khach_hang'] as $khach_hang) { // hiển thị thông tin khách hàng
            echo "<div class='hienthi'>";
            echo "<p  >Thông tin chi tiết của khách hàng  </p></br>";
            echo $khach_hang['name']. ' - ' . $khach_hang['mail'] . ' - ' . $khach_hang['add'] . ' - ' . $khach_hang['phone'] . '<br>';
            echo "<a href='session3.php' >Click here! </a>";
            echo "</div>";
        };        
    ?>
    <form id="forml" name="forml" method="post" action="session2.php">
        <table class = "body">
            <tr>
            <td><div class="tinhtien" ></td>
            <td><h1 class="tinhtienh1">Thông tin đăng nhập</h1></td>
            </tr>
            <tr>
                <td>Họ và tên:</td>
                <td><input class="input"  type="text" name="name"value="<?php if(isset($_POST['name']))  echo $khach_hang['name']; ?>" ></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input class="input" type="text" name="mail" value="<?php if(isset($_POST['mail']))  echo $khach_hang['mail']; ?>"></td>
            </tr>
            <tr>
                <td>Số điện thoại:</td>
                <td><input class="input" type="text" name="phone" value="<?php if(isset($_POST['phone']))  echo $khach_hang['phone']; ?>"></td>
            </tr>
            <br>
            <tr>
                <td>  Địa chỉ:</td>
                <td><input class="input" type="text" name="add" value="<?php if(isset($_POST['add']))  echo $khach_hang['add']; ?>"></td>
            </tr>
            <tr>
            <td>    <button type="submit" class="bt1" >Submit</button></td>
            </tr>

        </table>   
    </form>
     <br> <br>   
</body>
</html>
</body>
</html>