<?php
session_start();
include_once "includes/db_connection.php";

// Grab user input from login form
$input_username = $_POST['username'];
$input_password = $_POST['password'];

// Prepare SQL statement to retrieve user from database
$stmt = $conn->prepare("SELECT * FROM user WHERE username=?");
$stmt->bind_param("s", $input_username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User exists, verify password
    $row = $result->fetch_assoc();
    if (password_verify($input_password, $row['password'])) {
        // Password is correct, set session variables
        $_SESSION['user_id'] = $row['user_id']; // Store user_id in session
        $_SESSION['username'] = $input_username;
        $stmt->close();
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Incorrect Password!');</script>";
        header("Location: index.php");
        exit();
    }
} else {
    echo "<script>alert('Please Register!');</script>";
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define your validation rules here
    $errors = [];
    
    // Validate username
    if (empty($_POST["username"])) {
        $errors["username"] = "Username is required";
    }
    
    // Validate password
    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required";
    }
    
    // If no errors, proceed with authentication
    if (empty($errors)) {
        // Add your authentication logic here
        // For example, check username and password against database
        // If authentication succeeds, redirect user to dashboard
        // If authentication fails, set an error message
        $error_message = "Invalid username or password";
    }
}

// Function to check if the logged-in user owns the note
function userOwnsNote($noteId, $userId, $conn) {
    $stmt = $conn->prepare("SELECT * FROM notes WHERE note_id=? AND user_id=?");
    $stmt->bind_param("ii", $noteId, $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows === 1;
}

$conn->close();
?>
