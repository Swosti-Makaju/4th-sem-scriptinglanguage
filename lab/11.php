<!DOCTYPE html>
<html lang="en">
<head> <title>File Read/Write</title> </head>
<body>
    <h2>File Read/Write</h2>
    <?php
    $file_name = "file.txt";
    $content_to_write = "Hello, this is a string written to a file!";
    if (file_put_contents($file_name, $content_to_write)) {
        echo "<p>Content has been written to the file '{$file_name}'.</p>";
    } else {
        echo "<p>Failed to write content to the file '{$file_name}'.</p>";  }
    $read_content = file_get_contents($file_name);
    if ($read_content !== false) {
        echo "<p>Content read from the file '{$file_name}':<br>{$read_content}</p>";
    } else {
        echo "<p>Failed to read content from the file '{$file_name}'.</p>";
    }
    ?>
</body>
</html>
