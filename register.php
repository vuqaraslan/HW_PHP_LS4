<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

    <a href="index.php" class="home-button">Home</a>

    <div class="register-container">
        <h2>Create an Account</h2>
        <form action="register.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="submit" value="Register">
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>

</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirm_password'];

    if($password!=$confirmPassword){
        header('Location: register.php');
        exit();
    }

    // $cookie_name=$email;

    $userDatas=($username.'-'.$email.'-'.$password.'-'.$confirmPassword);

    $cookie_value=$userDatas;

    list($keyBeforeAT,)=explode('@',$email);

    setcookie($keyBeforeAT, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    
    header('Location: login.php');

    // echo "<p>" . htmlspecialchars($username) . "</p>";
    // echo "<p> $username </p> <br> <p> $email </p> <br><p> $password </p> <br>";
    // echo "<p> $userDatas </p> <br>".'<br>';
    // echo "<p>" . htmlspecialchars($_COOKIE[$cookie_name]) . "</p>";
}
?>

