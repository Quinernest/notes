<?php
// Database connection
include_once 'includes/db_connection.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $note_id = $_GET['id'];

    // Insert the note ID into the archive table
    $archive_sql = "INSERT INTO archive (note_id) VALUES ($note_id)";
    if ($conn->query($archive_sql) === TRUE) {
        // Optionally, you can delete the note from the main table
        $delete_sql = "DELETE FROM note WHERE note_id = $note_id";
        $conn->query($delete_sql);

        echo "Note archived successfully.";
        header("Location: dashboard.php");
            exit();
    } else {
        echo "Error archiving note: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
