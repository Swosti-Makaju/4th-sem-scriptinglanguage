<!DOCTYPE html>
<html lang="en">
<head> <title>File Upload</title> </head>
<body>
    <h2>Upload a File</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" required> <br>
        <input type="submit" value="Upload">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "<p>The file " . basename($_FILES["file"]["name"]) . " has been uploaded.</p>";
            } else {
                echo "<p>Sorry, there was an error uploading your file.</p>";
            }
        } else {
            echo "<p>Please select a file to upload.</p>";
        } }
    ?>
</body>
</html>
