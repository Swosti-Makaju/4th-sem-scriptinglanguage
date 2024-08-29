<?php
session_start();
require_once '../connection.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $username =$_POST['username'];
    $pwd= $_POST['pwd'];

    $sql= "SELECT * FROM users WHERE username='$username' AND password='$pwd'";
    $loginStmt = $con ->prepare($sql);
    $loginStmt->execute();

    $loginuser= $loginStmt->fetch(PDO::FETCH_ASSOC);
    if($loginuser){
        // echo "login Succcessful";
        $_SESSION['user_login']=true;
        // $_SESSION['username']=$username;

        $_SESSION['username']= $loginuser['username'];

        $_SESSION['userId']= $loginuser['id'];
        header("Location: index.php");
        die;
    }
    else{
        header("Location: loginform.php?error=Your credentials do not mach our records.");
        die;
    }
    // if ($username === 'sita' && pwd ==='sita@123'){
    //     echo 'Correct Login.';
    // }
    //     else{
    //         echo 'Invalid credentials';
    //     }
   
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
            <?php
if(isset($_GET['error'])){
    ?> <div class="alert alert-danger">
        <?php echo $_GET['error'];?>
</div>
<?php
}
            ?>
        <form action="" method="POST">
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

                <button class="btn btn-primary" type="submit">Login</button>  <!--btn-secondary, btn-warning (you can try more)-->
                </div>
            </div>
        </form>
    </div>
</body>
</html>