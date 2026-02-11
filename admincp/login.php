<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['submit'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username ='".$taikhoan."' AND password ='".$matkhau."' LIMIT 1";
        $row = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($row);/*đếm số dòng cua row */
        if($count > 0){
            $_SESSION['submit'] = $taikhoan;
            header("Location:index.php");
        }else{
            echo'<script>alert("Tài khoản hoặc mật khẩu không đúng vui lòng nhập lại!!!");</script>';
            header("Location:login.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logogr.png" type="image/x-icon">  
    <title>Login</title>
    <style>
        .input-field {

position: relative;
border-bottom: 2px solid rgb(113, 113, 113);
margin: 20px 0;
}

.input-field label {

position: absolute;
top: 50%;
left: 0;
transform: translateY(-50%);
color: #000000;
font-size: 16px;
pointer-events: none;
transition: 0.3s ease;
}

.input-field input {
width: 100%;
height: 40px;
background: transparent;
border: none;
outline: none;
font-size: 16px;
color: #000000;
padding: 0 10px;
}

*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: "Open Sans", sans-serif;
}
body {
display: flex;
align-items: center;
justify-content: center;
min-height: 100vh;
width: 100%;
padding: 10px;
background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);

}
body::before {
content: "";
position: absolute;
width: 100%;
height: 100%;
background-color: rgb(215, 215, 215) ;
background-position: center;
background-size: cover;
z-index: -1;
}
.wrapper a:hover {
text-decoration: underline;
}
button {
background-color: #68ad91;
color: #ffffff;
font-weight: 600;
border: none;
padding: 15px 20px;
cursor: pointer;
border-radius: 25px;
font-size: 16px;
border: 2px solid transparent;
transition: #ffffff;
}
button:hover {
color: #000000;
background: rgba(255, 255, 255, 0.2);
border-color: #ffffff;
}

.register {
text-align: center;
margin-top: 30px;
color: #000000;
}

.wrapper {
width: 400px;
border-radius: 15px;
padding: 40px;
text-align: center;
background: rgba(255, 255, 255, 0.1);
border: 1px solid rgba(255, 255, 255, 0.2);
backdrop-filter: blur(20px);
-webkit-backdrop-filter: blur(20px);
box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
transition: all 0.3s ease;
}

.wrapper:hover {
box-shadow: 0 12px 48px rgba(0, 0, 0, 0.5);
}

form {
display: flex;
flex-direction: column;
}

h2 {
font-size: 2.2rem;
margin-bottom: 25px;
color: #000000;
letter-spacing: 1px;
}

.input-field input:focus ~ label,
.input-field input:valid ~ label {
font-size: 0.9rem;
top: 10px;
transform: translateY(-150%);
color: #ffdde1;
}

.forget {
display: flex;
align-items: center;
justify-content: space-between;
margin: 25px 0 35px 0;
color: #ffffff;
}

#remember {
accent-color: #ffdde1;
}

.forget label {
display: flex;
align-items: center;
}

.forget label p {
margin-left: 8px;
}

.wrapper a {
color: #ffdde1;
text-decoration: none;
}

.input-field input:focus ~ label,
.input-field input:valid ~ label {
font-size: 0.9rem;
top: 10px;
transform: translateY(-150%);
color: #000000;
}

.forget {
display: flex;
align-items: center;
justify-content: space-between;
margin: 25px 0 35px 0;
color: #000000;
}

#remember {
accent-color: #848484;
}

.forget label {
display: flex;
align-items: center;
}

.forget label p {
margin-left: 8px;
}

.wrapper a {
color: #299db8;
text-decoration: none;
}
    </style>
</head>
<body>
<div class="body">
    <div class="wrapper">
        <form action="#" autocomplete="off" method="POST">
            <h2>Login Form Admin</h2>
            <div class="input-field">
                <input type="text" name="username">
                <label>Username</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" >
                <label>Enter your password</label>
            </div>
            <button type="submit" name="submit">Log In</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>
