<!DOCTYPE html>
<html lang="en">
<head>  <title>Subtraction Result</title> </head>
<body>
    <h1>Subtraction Result</h1>
    <form method="post">
        <label for="num1">Enter first number:</label>
        <input type="number" id="num1" name="num1" required> <br>
        <label for="num2">Enter second number:</label>
        <input type="number" id="num2" name="num2" required> <br>
        <input type="submit" value="Subtract">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $result = $num1 - $num2;
        echo "<p>The result of $num1 - $num2 is: $result</p>"; } 
   ?>
</body> 
</html>
