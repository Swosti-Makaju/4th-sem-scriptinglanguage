<?php
$con=null;
try{
      $con = new PDO("mysql:host=localhost;dbname=swastik_ecommerce","root","");
      // echo "Database connection successfully.";
}
catch(Exception $e){
echo "There is an error while connecting to database".$e -> getmessage();
die;
}