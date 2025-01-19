<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit; }
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'user' && $password === 'password') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else { $error = "Invalid username or password!";
    } }
?>
<!DOCTYPE html>
<html lang="en">
<head> <title>Login</title> </head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="post">
        <label for="username">Username:</label> <br>
        <input type="text" id="username" name="username" required> <br>
        <label for="password">Password:</label> <br>
        <input type="password" id="password" name="password" required> <br>
        <input type="submit" value="Login">
    </form> </body> </html>
