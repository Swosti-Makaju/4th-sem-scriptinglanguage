<?php
require_once "./logincheck.php"; 
$id=$_GET['id'];
$sql= "SELECT * FROM categories WHERE id=$id" ;
$stmt= $con->prepare($sql);
$stmt-> execute();
$category= $stmt->fetch(PDO::FETCH_ASSOC);
// print_r($category);
// die;

if($_SERVER['REQUEST_METHOD']=== 'POST'){
      //handle login submit
      $name = $_POST['name'];
      $description = $_POST['description'];
      $status=$_POST['status'];

      $sql="UPDATE categories SET
      name='$name',
      description='$description',
      status=$status
      WHERE id=$id";

      $catStmt= $con->prepare($sql);
      $catStmt->execute();

      //redirect the user to category listing page
      header("Location:categories.php?success=Category added successfully.");
      die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminstrative Pannel-Swastik Ecommerce</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
    <h1>Hello Welcome to Adminstrative Pannel-Swastik Ecommerce</h1>
    <p>
        Hello <?php echo $_SESSION['username'];?> !
        <a  onclick="return confirm('Are you sure to logout');" href="logout.php">Logout</a>
    </p>
     <?php require_once "./menus.php";?>
<div class="main" >
<h2> Categories</h2>
<div class="card-header">
   Add New Categories
</div>
<div class="card-body">
    

    <form method="post" action="">
  <div class="form-group">
    <!-- <form action="/action_page.php"> -->
        <div class="form-group"> 
    <label for="name">Name:</label>
    <input value="<?php echo $category['name'];?>" type="text" required name="name" class=form-control"
    id="name">
    </div>
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
   <textarea rows="5" name="description" id="description" class="form-control"><?php echo $category['description'];?></textarea>
  </div>
  <div class="form-control">
    <label for="status">Status:</label>
    <select name="status" id="status" class="form-control">
        <option value="">Select status</option>
        <option <?php echo $category['status']=='1' ? 'selected' : ''; ?> value="1">Active</option>
        <option <?php echo $category['status']=='0' ? 'selected' : ''; ?> value="0">Inactive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="categories.php" class="btn btn-secondary">Cancel</a>
</form>


</div>

</div>
</div>
</div>

</div>
<div class="footer border-top">
    Copyright @ Swastik Ecommerce
</div>
</div>
</body>
</html>