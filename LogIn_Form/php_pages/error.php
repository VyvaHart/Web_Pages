<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="/LogIn_Form/css/style0.css">
</head>
<body>
<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('location: form.php');
    } else {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $valid_login = 'user';
            $valid_password = 'user';
        }
    
    
        if (isset($_POST['user']) && isset($_POST['password'])) {
            $login = $_POST["user"];
            $password = $_POST["password"];
    
            if ($login == $valid_login && $password == $valid_password) {
                $_SESSION['login'] = $login;
                header("Location: form.php");
            } else {
                header("Location: error.php");
            }
        }
    }
?>

    <div class="container">
        <div class="header">
            <h2>LOGIN</h2>
        </div>

        <form action="#" method="POST" class="form" id="form">
            <div class="form-control">
                 <label>User</label>
                 <input type="text" placeholder="user" id="name" name="user">
            </div>

            <div class="form-control">
                <label>Password</label>
                <input type="password" placeholder="user" id="surname" name="password">
                <h5>   Login or password incorrect</h5>
           </div>

            <button>Login</button>

        </form>

    </div>
    <a href="/LogIn_Form/screenshot/code.html"><button type="submit" id="scrn">PHP ScreenShots</button></a>

</body>
</html>