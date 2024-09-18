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

// Check if user is logged in and get their user ID

if (!isset($_SESSION['user_id'])) {
    // Redirect user to login page or handle unauthorized access
    header("Location: index.php");
    exit();
}
$user_id = $_SESSION['user_id'];

// Function to fetch notes for the current user
function getNotes($conn, $user_id) {
    $sql = "SELECT * FROM note 
            WHERE user_id = $user_id 
            AND note_id NOT IN (SELECT note_id FROM archive) 
            AND note_id NOT IN (SELECT note_id FROM trashnote) 
            ORDER BY created_at DESC";
    $result = $conn->query($sql);
    $notes = array();
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $notes[] = $row;
        }
    }
    return $notes;
}





// Display notes
$notes = getNotes($conn, $user_id);

// Function to display notes
function displayNotes($notes) {
    foreach ($notes as $note) {
        echo "<div class='note'>";
        echo "<h2>" . $note['title'] . "</h2>";
        echo "<p>" . substr($note['content'], 0, 100) . "</p>";
        echo "<div class='note-actions'>";
        echo "<button onclick='viewNote(" . $note['note_id'] . ")'>View</button>";
        echo "<button onclick='editNote(" . $note['note_id'] . ")'>Edit</button>";
        echo "<button onclick='deleteNote(" . $note['note_id'] . ")'>Delete</button>";
        echo "</div>";
        echo "<p>Created at: " . $note['created_at'] . "</p>";
        echo "</div>";
    }
}

// Function to edit notes
function editNotes($noteId) {
    // Retrieve note details from the database based on $noteId
    global $conn;
    $sql = "SELECT * FROM note WHERE note_id = $noteId";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $noteDetails = $result->fetch_assoc();
        echo "<form action='edit_notes.php' method='POST'>";
        echo "<input type='hidden' name='note_id' value='" . $noteId . "'>";
        echo "<label for='title'>Title:</label>";
        echo "<input type='text' name='title' value='" . $noteDetails['title'] . "'><br>";
        echo "<label for='content'>Content:</label>";
        echo "<textarea name='content'>" . $noteDetails['content'] . "</textarea><br>";
        echo "<button type='submit'>Save Changes</button>";
        echo "</form>";
    } else {
        echo "Note not found.";
    }
}

function truncateTitle($title, $limit = 10) {
    // Check if the length of the title exceeds the limit
    if (strlen($title) > $limit) {
        // Truncate the title and add ellipsis
        $title = substr($title, 0, $limit) . '...';
    }
    return $title;
}

// Function to delete a note
function deleteNote($conn, $note_id) {
    $delete_sql = "DELETE FROM note WHERE note_id = $note_id";
    if ($conn->query($delete_sql) === TRUE) {
        return true; // Return true if deletion is successful
    } else {
        return false; // Return false if there's an error
    }
}


function displayLogoutPopup() {
    echo "<script>";
    echo "function logout() {";
    echo "if (confirm('Are you sure you want to log out?')) {";
    echo "window.location.href = 'logout.php';";
    echo "}";
    echo "}";
    echo "</script>";
}
displayLogoutPopup();

function archiveNote($noteId) {
    global $conn;
    $sql = "UPDATE note SET archived = 1 WHERE note_id = $noteId";
    if ($conn->query($sql) === TRUE) {
        echo "Note archived successfully";
    } else {
        echo "Error archiving note: " . $conn->error;
    }
}



?>