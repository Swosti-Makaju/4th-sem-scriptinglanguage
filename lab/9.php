<?php
// Set the value to be stored in the cookie
$cookieValue = "Hello, this is a cookie!";
// Set the expiration time for the cookie (24 hours from now)
$expirationTime = time() + (24 * 60 * 60); // 24 hours * 60 minutes * 60 seconds
// Set the cookie with the value and expiration time
setcookie("myCookie", $cookieValue, $expirationTime, "/");
echo "Cookie 'myCookie' is set with value: $cookieValue";
?>

