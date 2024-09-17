<?php
$servername = "localhost";
$username = "root";
$password = ""; // Enter your database password here
$dbname = "notes"; // Enter your database name here

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
