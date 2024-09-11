<?php
require_once "./logincheck.php"; 

if (!isset( $_GET['id'])){
  header("Location:categories.php?error=Please provide a valid ID for the category");
  die;
}
$id=(int)  $_GET['id'];

$sql=" DELETE FROM categories WHERE id=$id";
$stmt= $con->prepare($sql);
$stmt->execute();

   header("Location:categories.php?success=Selected category is deleted successfully.");
   die;
