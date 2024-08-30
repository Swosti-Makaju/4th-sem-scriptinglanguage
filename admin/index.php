<?php

session_start();
if(!isset($_SESSION['user_login'])){
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
      <div class="container">
      <h1>welcome to Administrative pannel of Swastik College</h1>
      <p>
            Hello<?php echo $_SESSION['username']; ?>!
      </p>
      <a onclick="return confirm('Are you sure to logout?')" href="logout.php">Logout</a>
      </div>
</body>
</html>