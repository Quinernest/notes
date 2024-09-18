<?php
session_start();

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

// Prepare SQL query to fetch username and email based on provided credentials
$sql = "SELECT user_id, username, email FROM user WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Assuming you have variables for username and password
$username = $_POST['username']; // Assuming you're receiving these via POST
$password = $_POST['password']; // Assuming you're receiving these via POST

// Bind parameters
$stmt->bind_param("ss", $username, $password);

// Execute statement
$stmt->execute();
$stmt->store_result();

// Check if the query returned any results
if ($stmt->num_rows == 1) {
    // Bind the result variables
    $stmt->bind_result($id, $username, $email);
    // Fetch the result
    $stmt->fetch();

    // Store user ID, username, and email in session
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;

    // Redirect to profile page
    header("Location: profile.php");
    exit();
} else {
    echo "Invalid username or password.";
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        max-width: 600px;
        margin: 20px auto;
        padding: 30px; 
        border-radius: 111px;
        background-color: #ebf2fa;
    }

    .header {
       
        color: black;
        padding: 20px;
        text-align: center;
    }

    .header h1 {
        margin: 0;
        font-size: 24px;
    }

    .back-btn {
        color: black;
        text-decoration: none;
        font-weight: bold;
        
        padding: 5px 10px;
        border-radius: 5px;
    }

    .back-btn:hover {
        background-color: #fff;
        color: #333;
    }

    .container {
        background-color: #73a942;
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 20px;
        float: left;
    }

    .avatar img {
        width: 100%;
        height: auto;
    }

    .user-details {
        overflow: hidden;
    }

    .user-details h2 {
        margin-top: 0;
        font-size: 24px;
    }

    .profile-info {
        margin-bottom: 20px;
    }

    .edit-profile {
        display: inline-block;
        margin-right: 10px;
        color: #007bff;
        text-decoration: none;
    }

    .change-avatar {
        display: inline-block;
        margin-right: 10px;
        color: #007bff;
        text-decoration: none;
    }

    .activity-feed {
        margin-top: 20px;
    }

    .activity-feed h3 {
        margin-top: 0;
        font-size: 20px;
    }

    .activity-feed ul {
        list-style-type: none;
        padding: 0;
    }

    .activity-feed li {
        margin-bottom: 10px;
    }

    .activity-feed .timestamp {
        color: #666;
        font-size: 12px;
    }
</style>
<body>


    <div class="header">
        <h1>User Profile</h1>
        <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
    </div>

    <div class="container">
        <div class="profile-info">
            <div class="avatar">
                <img src="img/logo profile.png" alt="">
            </div>
            <div class="user-details">
                <h2>HI! <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
                <a href="edit_profile.php" class="edit-profile">Edit Profile</a>
                <a href="change_avatar.php" class="change-avatar">Change Avatar</a>
            </div>
        </div>

        <div class="activity-feed">
            <h3>Activity Feed:</h3>
            <ul>
                <li>User updated their profile picture. <span class="timestamp">2 hours ago</span></li>
                <li>User changed their bio. <span class="timestamp">3 days ago</span></li>
                <!-- More activity log entries can go here -->
            </ul>
        </div>
    </div>
</body>
</html>


