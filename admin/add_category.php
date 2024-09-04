<?php
require_once "./logincheck.php"; 

if($_SERVER['REQUEST_METHOD']==='POST'){
      $name =$_POST['name'];
      $description= $_POST['description'];
      $status=$_POST['status'];
  
$sql="INSERT INTO categories SET
name='$name',
description='$description',
status='$status'  ";

$catStmt=$con-> prepare($sql);
$catStmt->execute();

//redirect the user to category listing page
header("Location: categories.php?success=Category added successfully.");
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
     <?php require_once("./menus.php");?>
<div class="main" >

<div class="card-header">
   Add New Category
    <a href="add_category.php" class="btn btn-primary">Add New</a>
</div>
<div class="card-body p-8">

<form method="post" action="">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" class="form-control" id="text">
  </div>
  <div class="form-group">
    <label for="description">Description:</label>
    <textarea rows="5" name="description" id="description" class="form-control"></textarea>
  </div>
 <div class="form-group">
      <label for="status">Status</label>
      <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
      </select>
 </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="categories.php" class="btn btn-primary">Cancel</a>
</form>

</div>

</div>
<div class="footer border-top">
    Copyright @ Swastik Ecommerce
</div>
</div>
</body>
</html>