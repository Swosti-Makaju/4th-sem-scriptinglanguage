<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head> <title>Dashboard</title> </head>
<body>
    <h2>Welcome to the Dashboard, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is the dashboard page. You are logged in.</p>
    <a href="logout.php">Logout</a>
</body> </html>
