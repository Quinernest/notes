<?php
// Database connection
include_once 'includes/db_connection.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $note_id = $_GET['id'];

    // Insert the note ID into the favorite table
    $favorite_sql = "INSERT INTO favorite (note_id, favorite_id) VALUES (?, ?)";
    
    // Create a prepared statement
    $stmt = $conn->prepare($favorite_sql);
    
    // Bind parameters
    $stmt->bind_param("ii", $note_id, $favorite_id);
    
    // Set the value for $favorite_id (you may need to retrieve this value from somewhere)
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Note marked as favorite successfully.";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error marking note as favorite: " . $stmt->error;
    }
} else {
    echo "Invalid request.";
}
?>
