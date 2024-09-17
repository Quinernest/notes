<?php
session_start();
include_once "includes/db_connection.php";

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Grab user input from registration form and sanitize
$fname = sanitize_input($_POST['fname']);
$lname = sanitize_input($_POST['lname']);
$username = sanitize_input($_POST['username']);
$email = sanitize_input($_POST['email']);
$password = sanitize_input($_POST['password']);
$repassword = sanitize_input($_POST['repassword']);

// Check if any of the fields are empty
if (empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password) || empty($repassword)) {
    echo "Error: All fields are required";
    exit;
}

// Check if passwords match
if ($password !== $repassword) {
    echo "Error: Passwords do not match";
    exit;
}

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL statement to insert user into database using prepared statements
$stmt = $conn->prepare("INSERT INTO user (fname, lname, username, email, password) VALUES (?, ?, ?, ?, ?)");
if ($stmt === false) {
    // Handle the error, perhaps log it or display a message
    die("Error: " . $conn->error);
}
$stmt->bind_param("sssss", $fname, $lname, $username, $email, $hashed_password);

if ($stmt->execute()) {
    // Registration successful, redirect to dashboard
    header("Location: index.php");
    exit; // Ensure no further code execution
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
