<?php
require_once "./logincheck.php"; 

if (!isset( $_GET['id'])){
  header("Location:products.php?error=Please provide a valid ID for the category");
  die;
}
$id=(int)  $_GET['id'];

$sql=" DELETE FROM products WHERE id=$id";
$stmt= $con->prepare($sql);
$stmt->execute();

   header("Location:products.php?success=Selected category is deleted successfully.");
   die;
