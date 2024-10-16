<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <a href="index.php" class="home-button">Home</a>

    <div class="login-container">
        <h2>Login to Your Account</h2>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $_SESSION['email']=$email;
    $_SESSION['password']=$password;

    list($keyCookie,)=explode('@',$email);

    if (!isset($_COOKIE[$keyCookie])) {
        header('Location: register.php');
        exit();
    }

    list($uName,$uEmail,$uPass,)=explode('-',$_COOKIE[$keyCookie]);

    if($uEmail!=$email || $uPass!=$password){
        header('Location: index.php');
        exit();
    }

    header('Location: admin.php?cookie_key='.$keyCookie);
}



?>