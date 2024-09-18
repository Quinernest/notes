<?php
// Start PHP block
session_start(); // Start session (if not already started)

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or display an error message
    header("Location: login.php"); // Replace login.php with your actual login page
    exit();
}

$conn = mysqli_connect(
    getenv('DB_HOST'),       // Database host (e.g., localhost or the Coolify server)
    getenv('DB_USERNAME'),   // Database username
    getenv('DB_PASSWORD'),   // Database password
    getenv('DB_DATABASE'),   // Database name
    getenv('DB_PORT') ?: '3306' // Database port, default to 3306 if not set
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Logged-in user's ID
$user_id = $_SESSION['user_id'];

// SQL query to retrieve archived notes of the logged-in user with title, content, and created_at
$sql = "SELECT note.note_id, note.title, note.content, note.created_at 
        FROM archive 
        INNER JOIN note ON archive.note_id = note.note_id 
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