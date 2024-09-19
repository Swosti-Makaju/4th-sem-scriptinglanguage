<?php
require_once "./logincheck.php"; 
$id=(int) $_GET['id'];
if (!isset( $_GET['id'])){
  // die("Please provide a valid ID for the category");
  header("Location:products.php?error=Please provide a valid ID for the category");
  die;
}
$id=(int)  $_GET['id'];
$uploadPath="../product_images";
$sql="SELECT * FROM products WHERE id=$id";
$stmt= $con->prepare($sql);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$product){
  // die("No category found with the given ID");
   header("Location:products.php?error=Please provide a valid ID for the product");
   die;
}
// print_r($category);
// die;

$stmt= $con->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']=== 'POST'){
      //handle login submit
      $sku = $_POST['sku'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $category_id= $_POST['category_id'];
      $description = $_POST['description'];
      $status=$_POST['status'];
      $imageNameOld=$_POST['image_name_old'];

      $imageName=$imageNameOld;
      if(is_uploaded_file($_FILES['image_name']['tmp_name'])){
        //delete old image before uploading new
        if(!empty($imageNameOld)&& file_exists('../product_images/'.$imageNameOld)){
          unlink('../product_images/'.$imageNameOld);
        }
        $imageName=$_FILES['image_name']['name'];
        move_uploaded_file($_FILES['image_name']['tmp_name'],$uploadPath."/".$imageName);
        // echo 'image uploaded successfully.';
      }

      $sql="UPDATE products SET
         sku='$sku',
      name='$name',
      price=$price,
      image_name='$imageName',
      category_id=$category_id,
      description='$description',
      status=$status
      WHERE id=$id";

      $catStmt= $con->prepare($sql);
      $catStmt->execute();

      //redirect the user to category listing page
      header("Location:products.php?success=Product added successfully.");
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
     <?php require_once("./menus.php");?>
<div class="main" >
<h2> Products</h2>
<div class="card-header">
   Add New Products
</div>
<div class="card-body">
    
    <form method="post" action=""  enctype="multipart/form-data">
    <div class="form-group">
    <label for="name">SKU:</label>
    <input 
    value="<?php echo $product['sku'];?>"
    type="text" 
    required 
    name="sku" 
    class="form-control" id="sku">
  </div>

  <div class="form-group">
    <label for="name">Name:</label>
    <input 
    value="<?php echo $product['name'];?>"
    type="text" 
    required 
    name="name" 
    class="form-control" id="name">
  </div>

  <div class="form-group">
    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">Select Category</option>
        <?php foreach($categories as $category){ ?>
         <option <?php echo $product['status']=='1'?'selected':'';?>
          value="<?php echo $category['id'];?>">
           <?php echo $category['name'];?></option>
         <?php } ?>
    </select>
  </div>

  <div class="form-group">
    <label for="name">Price:</label>
    <input 
    value="<?php echo $product['price'];?>"
    type="number" 
    required 
    name="price" 
    class="form-control" id="price">
  </div>

  <div class="form-group">
      <label for="image_name">Image:</label>
      <input type="file" accept=".jpg,.jpeg,.png"  name="image_name" class="form-control" id="image_name">
      <input type="hidden" name="image_name_old" value="<?php echo $product['image_name'];?>>

       <?php if(!empty($product['image_name'])&& file_exists('../product_images/' .$product['image_name'])){?>
                    <img width="100"  src="../product_images/<?php echo $product['image_name'];?>" alt="">
               <?php } ?> 
    </div>

  <div class="form-group">
    <label for="description">Description:</label>
   <textarea rows="5" name="description" id="description" class="form-control"><?php echo $product['description'];?></textarea>
  </div>

  <div class="form-control">
    <label for="status">Status:</label>
    <select name="status" id="status" class="form-control">
        <option value="">Select status</option>
        <option value="1" <?php echo $product['status']=='1'?'selected':'';?>>Active</option>
        <option value="0" <?php echo $product['status']=='0'?'selected':'';?>>Inactive</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="products.php" class="btn btn-secondary">Cancel</a>
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