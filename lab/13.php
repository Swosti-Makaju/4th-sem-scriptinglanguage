<!DOCTYPE html>
<html lang="en">
<head> <title>Student Records</title> </head>
<body>
    <h2>Student Records</h2>
    <?php
    $servername = "localhost";  
    $username = "root";     
    $password = "";     
    $database = "swastik";      
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error); }
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo"<tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th><th>Date of Birth</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["date_of_birth"] . "</td>";
            echo "</tr>";
        }  echo "</table>";
    } else {
     echo "No student records found";   }
    $conn->close();
    ?>
</body>
</html>
