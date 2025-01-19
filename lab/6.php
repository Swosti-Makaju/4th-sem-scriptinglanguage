<!DOCTYPE html>
<html lang="en">
<head>  <title>Display Form Values</title> </head>
<body>
    <h1>Display Form Values</h1>
    <form method="get">
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name" required> <br>
        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" required> <br>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_GET["name"]) && isset($_GET["age"])) {
        $name = $_GET["name"];
        $age = $_GET["age"];
        echo "<h1>Hello, $name!</h1>";
        echo "<h1>Your age is $age.</h1>"; }
   ?>
</body> </html>
