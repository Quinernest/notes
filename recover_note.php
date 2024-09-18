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

// Function to delete records from trashnote table
// Function to delete a note_id from trashnote table
function deleteNoteFromTrash($conn, $note_id) {
    // SQL statement to delete records
    $sql = "DELETE FROM trashnote WHERE note_id = ?";
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $note_id);
    // Execute the delete statement
    if ($stmt->execute()) {
        echo "Note deleted from trash successfully";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error deleting note from trash: " . $conn->error;
    }
    // Close statement
    $stmt->close();
}

// Check if note_id is provided
if(isset($_GET['note_id'])) {
    $note_id_to_delete = $_GET['note_id'];
    deleteNoteFromTrash($conn, $note_id_to_delete);
} else {
    echo "Note ID not provided.";
}
