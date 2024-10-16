<?php

session_start();

if( !isset($_SESSION['email']) && !isset($_SESSION['password'])){
    header('Location: register.php');
    exit();
}
// echo $_SESSION['email'] . '<br>';
// echo $_SESSION['password'] . '<br>';

if (isset($_GET['cookie_key'])) {
    $cookieKey = $_GET['cookie_key'];
    echo "<p style='color:red;'>$cookieKey</p>";
    
    if (!isset($_COOKIE[$cookieKey])) {
        header('Location: register.php');
        exit();
    }
    else{
    list($uName,$uEmail,$uPass,)=explode('-',$_COOKIE[$cookieKey]);

        echo 'Admin Page';
        echo "<p> Welcome Dear, " . $uName . " to Our Site !</p>";
    }
    
}
else{
    header('Location: register.php');
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <p>Welcome, <?php echo $uName; ?>!</p>
        <a href="logout.php" class="logout-button">Logout</a>
    </header>
    <main>
        <section>
            <h2>Controller</h2>
            <ul>
                <li><a href="#">User Management</a></li>
                <li><a href="#">Content Management</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Admin Panel. All rights reserved.</p>
    </footer>
</body>
</html>
