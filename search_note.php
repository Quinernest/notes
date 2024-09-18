<?php
session_start(); // Start the session to manage user authentication

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
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];
    
    // Perform a search query in your database to get matching notes
    // Replace this with your actual database query
    $search_results = search_notes_in_database($search_query);

    // Output the search results
    foreach ($search_results as $note) {
        // Output HTML markup for each note
        echo '<div class="note">';
        echo '<h2>' . substr($note['title'], 0, 10) . '</h2>';
        echo '<p>' . wordwrap($note['content'], 20) . '</p>';
        echo '<p>Created at: ' . $note['created_at'] . '</p>';
        // Output other note details and settings as needed
        echo '</div>';
    }
}
?>

