<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: logout.php');
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    

    if ($username == 'admin' && $password == 'password') {
        header('Location: main.php');
        exit;
    }
    else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
        <button type="submit" name="logout">Leave</button>
    </form>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    
</body>
</html>