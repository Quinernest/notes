<?php
session_start(); // Start the session to manage user authentication

// Database connection settings
$host = 'localhost'; // Change this to your database host
$dbname = 'notes'; // Change this to your database name
$username = 'root'; // Change this to your database username
$password = ''; // Change this to your database password

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

