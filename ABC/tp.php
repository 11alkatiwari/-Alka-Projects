<?php
$servername = "localhost";
$username = "root"; // Change if using a different username
$password = ""; // Change if using a different password
$dbname = "phpcrud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>