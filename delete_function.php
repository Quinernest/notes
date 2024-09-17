<?php
// Start PHP block
session_start(); // Start session (if not already started)

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or display an error message
    header("Location: login.php"); // Replace login.php with your actual login page
    exit();
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Logged-in user's ID
$user_id = $_SESSION['user_id'];

// SQL query to retrieve trashed notes of the logged-in user with title, content, and created_at
$sql = "SELECT DISTINCT note.note_id, note.title, note.content, note.created_at 
        FROM trashnote 
        INNER JOIN note ON trashnote.note_id = note.note_id 
        WHERE note.user_id = $user_id";

// Execute query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result === false) {
    die("Error executing query: " . $conn->error);
}

// Initialize $notes array to store fetched data
$notes = [];

// Loop through the retrieved notes and store them in $notes array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notes[] = $row;
    }
}

// Close connection
$conn->close();
// End PHP block
?>
