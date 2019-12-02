<?php 
//logon to server - ideally it would be in seperate file for security reasons

define('DB_USER', 'krupitsky');
define('DB_PASSWORD', 'spiritsword99');
define('DB_HOST', 'localhost');
define('DB_NAME', 'krupitsky_SocialMedia');

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die("Connection failed: " . mysqli_connect_error());

?>