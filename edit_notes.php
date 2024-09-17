<?php
session_start();

include_once "includes/db_connection.php";

// Check if form is submitted
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve note ID from URL parameter
    $note_id = $_GET['note_id'] ?? '';

    // Retrieve updated title and content from the form
    $updated_title = $_POST['title'];
    $updated_content = $_POST['content'];

    // Update note in the database using prepared statement
    $sql = "UPDATE note SET title=?, content=? WHERE note_id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        exit();
    }
    $stmt->bind_param("ssi", $updated_title, $updated_content, $note_id);

    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit(); // Ensure script stops execution after redirect
    } else {
        echo "Error updating note: " . $stmt->error;
    }
}

?>
