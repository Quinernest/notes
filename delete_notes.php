<?php
// Database connection
include_once 'includes/db_connection.php'; // Include your database connection file

// Function to move note to trash
function moveToTrash($conn, $note_id) {
    $trash_id = ''; // You can define a trash ID here if needed
    
    // SQL to insert the note into the trash table
    $trash_sql = "INSERT INTO trashnote (trash_id, note_id) VALUES ('$trash_id', '$note_id')";
    
    if ($conn->query($trash_sql) === TRUE) {
        return true; // Return true if insertion is successful
    } else {
        return false; // Return false if there's an error
    }
}

if (isset($_GET['id'])) {
    $note_id = $_GET['id'];

    // Insert the note ID into the trash note table
    $trash_sql = "INSERT INTO trashnote (note_id) VALUES ($note_id)";
    if ($conn->query($trash_sql) === TRUE) {
        // Call the moveToTrash function
        if (moveToTrash($conn, $note_id)) {
            echo "Note moved to trash successfully.";
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error moving note to trash.";
        }
    } else {
        echo "Error moving note to trash: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>



