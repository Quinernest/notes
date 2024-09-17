<?php
session_start();
include_once "includes/db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $note_id = $_GET['id'];
    
    // Prepare and execute the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM note WHERE id = ?");
    $stmt->bind_param("i", $note_id);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Check if the note exists
    if ($result->num_rows > 0) {
        $note = $result->fetch_assoc();
    } else {
        echo "Note not found.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
