<?php
if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['submit']);
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <ul class="admin_menu">
        <h1 class="back"><a href="index.php?trangden=home&query=none">Welcome</a></h1>
        <li><a href="index.php?trangden=qldm&query=them"><i class="fas fa-list icon"></i>Quản lý danh mục</a></li>
        <li><a href="index.php?trangden=qlsp&query=them"><i class="fas fa-box icon"></i>Quản lý sản phẩm</a></li>
        <li><a href="index.php?dangxuat=1">Đăng xuất: <?php if(isset($_SESSION['submit'])) 
        {echo $_SESSION['submit'];}  
        ?></a></li>
    </ul>
</body>
</html>