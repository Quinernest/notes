<?php
session_start();
include_once "includes/db_connection.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle unauthorized access
    echo "Error: User not authenticated.";
    exit();
}

// Retrieve user ID from session
$user_id = $_SESSION['user_id'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Check if title or description is empty after trimming whitespace
    if (empty($title) || empty($content)) {
        // Redirect back to the form page or display an error message
        header("Location: dashboard.php");
        exit();
    }

    // Prepare SQL statement to insert new note
    $sql = "INSERT INTO note (user_id, title, content) VALUES (?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("iss", $user_id, $title, $content);
        
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Note added successfully
            // Redirect to dashboard or show success message
            header("Location: dashboard.php");
            exit();
        } else {
            // Error handling
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // Error handling for failed prepare
        echo "Error in preparing statement: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
