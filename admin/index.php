<?php
require_once"./logincheck.php";
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
      <div class="container border">
            <p>
                  Hello<?php echo $_SESSION['username']; ?>!
                  <a onclick="return confirm('Are you sure to logout?')" href="logout.php">Logout</a>
            </p>
            <?php require_once("./menus.php"); ?>
           </div>
</body>
</html>