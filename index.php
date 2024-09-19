<?php
require_once "./connection.php";

// get all the latest/new products (3)
$sql = "SELECT
categories.name as category_name,
products.*
FROM products
INNER JOIN categories ON categories.id=products.category_id
ORDER BY products.id DESC
LIMIT 4
";
$stmt = $con->prepare($sql);
$stmt->execute();
$latestProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Swastik Ecommerce</title>
<link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Swastik Ecommerce</h1>
</div>
</div>

<?php require_once("menus.php"); ?>

<div class="card">
<div class="card-header">Products</div>
<div class="card-body">
<div class="row">
<?php foreach ($latestProducts as $latestProduct) { ?>
<div class="col-md-3">
<h4><?php echo $latestProduct['name']; ?></h4>
<br>
<?php echo $latestProduct['category_name']; ?>
<?php if (!empty($latestProduct['image_name']) && file_exists('./product_images/' . $latestProduct['image_name'])) { ?>
<img class="img-thumbnail" src="./product_images/<?php echo $latestProduct['image_name']; ?>" alt="">
<?php } ?>
<p>
Price: Rs. <?php echo number_format($latestProduct['price'], 2); ?>
</p>
<a class="btn btn-primary" href="">View More</a>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</body>

</html>
