<?php

session_start();
if(!isset($_SESSION['userlogin'])){
      header("Location:loginform.php?error=You are not logged in , please login in first.");
      die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Adminstrative pannel</title>
      <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
      <h1>welcome to Swastik College</h1>
</body>
</html>