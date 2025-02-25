<?php
// Database credentials
$servername = "localhost"; // or your database host
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "echodesk-repo-main"; // your database name

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// You can uncomment the following line for debugging purposes
// echo "Connected successfully";

?>
