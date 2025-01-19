<!DOCTYPE html>
<html lang="en">
<head> <title>Student Registration Form</title> </head>
<body>
    <h2>Student Registration Form</h2>
    <form method="post" action="process_registration.php">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
