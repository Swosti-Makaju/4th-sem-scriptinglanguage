<?php
session_start();

require_once"../connection.php";

if($_SERVER['REQUEST_METHOD']=== 'POST'){
      //handle login submit
    /*  $username = $_POST['username'];
      $password = $_POST['password'];
      if($username === 'ram' && $password === '1234'){
            echo 'Correct Login';
      }else{
            echo 'Invalid credentials';
      }*/
     $sql = "SELECT * FROM users WHERE username='$username' AND password='1234'";
     $loginStmt = $con->prepare($sql);
     $loginStmt -> execute();

     $loginUser=$loginStmt->fetch(PDO::FETCH_ASSOC);
     if($loginUser){
        $_SESSION['user_login']=true;
        $_SESSION['userbname']=$username;
        header("Location:index.php");
        die;
       // echo "Login Successfully......";
     }else{
        echo "Invalid Creadentials.......";
     }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrative Pannel- Swastik Ecommerce</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <form action="">
            <div class="row">
                <div class="col-4">
                    <label for="username">Username</label>
                </div>
                <div class="col-8"> 
                    <input type="text" name="username" id="username">

                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="pwd"> Password</label>
                </div>
                <div class="col-8"> <input type="password" name="pwd" id="pwd">

                </div>
            </div><div class="row">
                <div class="col-12">

                <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>