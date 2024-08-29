<?php
//session_destroy();
session_start();
unset($_SESSION['user_login']);
unset($_SESSION['username']);
unset($_SESSION['userid']);
header("Location:login.php?success=You are logged out successfully...");
die;