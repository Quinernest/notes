<?php include 'function.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/dash.css">

    <title>Notes Dashboard</title>
    
</head>
<body>

<div class="container">

     <div class="sidebar">
        <img src="img/logo12.png" alt="Logo" width="150" >
        <a href="profile.php"> <!-- Add this line -->
        <img src="img/logo profile.png" alt="Logo" width="150"> <!-- Your logo image -->
       
    </a> <!-- Add this line -->
      
        <ul>
       
            <div class = "addbtn">
            <li><a href="dashboard.php">
                <i class ="fas fa-allnotes"></i>
                <span class = "nav-item">All Notes</span>
            </a></li></div>
            <div class = "addbtn">
            <li><a href="favorite.php">
                <i class ="fas fa-favorites"></i>
                <span class = "nav-item">Favorites</span>
            </a></li></div>
            <div class = "addbtn">
            <li><a href="delete.php">
                <i class ="fas fa-favorites"></i>
                <span class = "nav-item">Trash</span>
            </a></li></div>
            <div class = "addbtn">
            <li><a href="archive_note.php">
                <i class ="fas fa-archive"></i>
                <span class = "nav-item"><i class ="fas fa-archive"></i>Archive</span>
            </a></li></div>
            <div class = "addbtn" onclick="showLogoutPopup()"><li>Logout</li></div>

        </ul>
    </div>
    <div class="header" id="header" >
                <div class=addbtn  onclick="openPopup('add-note-popup')">
                <span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> Add Note
          </span>
                </div>
                <div class="search">
    <input type="text" name="query" placeholder="Search your notes here..." class="search-box" id="searchBox">
</div>
                 
                      
                  
            </div>
   
    <div class="content">
        <div class="notes-container">
            <?php foreach ($notes as $note): ?>
                <div class="note">
    <h2><?php echo substr($note['title'], 0, 10); ?></h2>
    <p>
        <?php 
            $content = $note['content'];
            if (str_word_count($content) > 50) {
                $content = implode(' ', array_slice(str_word_count($content, 2), 0, 40)) . '...';
            }
            echo wordwrap($content, 100); 
        ?>
    </p>

    <div class="settings">...
        <i onclick="showMenu(this)" class="uil uil-ellipsis-h"></i>
        <ul class="menu">
            <li onclick="openPopup('view-note-popup-<?php echo $note['note_id']; ?>')">View</li>
            <li onclick="openPopup('edit-note-popup-<?php echo $note['note_id']; ?>')">Edit</li>
            <li onclick="showConfirmation(<?php echo $note['note_id']; ?>)">Delete</li>
            <li onclick="archiveNote(<?php echo $note['note_id']; ?>)">Archive</li>
            <li onclick="favoriteNote(<?php echo $note['note_id']; ?>)">Add to Favorite</li>
        </ul>
    </div>
    <p>Created at: <?php echo $note['created_at']; ?></p>
</div>
                
                
            <?php endforeach; ?>
        </div>
    </div>
                <!-- Add note popup -->
<div class="popup-box" id="add-note-popup">
    <div class="popup">
    <span class="close" onclick="closePopup('add-note-popup')">&times;</span>
        <h2>Add Note</h2>
        <div class="container1">
        
        <form action="add_process.php" method="post" onsubmit="return validateForm(this)">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="4" required></textarea>
            <input type="submit" value="Add Note">
        </form>
       
    </div>
       
    </div>
</div>

<!-- View note popup -->
<?php foreach ($notes as $note): ?>
<div class="popup-box" id="view-note-popup-<?php echo $note['note_id']; ?>">

    <div class="popup">
    <span class="close" onclick="closePopup('view-note-popup-<?php echo $note['note_id']; ?>')">&times;</span>
        <h2>View Note</h2>
        <div class="container1">
        <p><strong>Title: </strong><?php echo $note['title']; ?></p>
        <p><strong>Content: </strong><?php echo $note['content']; ?></p>
        <p><strong>Created at: </strong><?php echo $note['created_at']; ?></p>
        <button onclick="openPopup('edit-note-popup-<?php echo $note['note_id']; ?>')">Edit Note</button>
        
        <button onclick="showConfirmation(<?php echo $note['note_id']; ?>)">Delete</button>

    </div>
       
    </div>
</div>
<?php endforeach; ?>

<!-- Edit note popup -->
<?php foreach ($notes as $note): ?>
<div class="popup-box" id="edit-note-popup-<?php echo $note['note_id']; ?>">
    <div class="popup">
    <span class="close" onclick="closePopup('edit-note-popup-<?php echo $note['note_id']; ?>')">&times;</span>
        <h2>Edit Note</h2>
        <div class="container1">
            <h1>Update Note</h1>
            <form method="post" action="edit_notes.php?note_id=<?php echo $note['note_id']; ?>">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($note['title']); ?>"><br>
                <label for="content">Content:</label><br>
                <textarea id="content" name="content"><?php echo htmlspecialchars($note['content']); ?></textarea><br>
                <input type="submit" value="Update Note">
            </form>
        </div>
        
    </div>
</div>
<?php endforeach; ?>


<!-- popup for logout -->
<div id="logoutPopup" class="popup1">
  <div class="popup-content1">
    <span class="close" onclick="closeLogoutPopup()">&times;</span>
    <p>Are you sure you want to logout?</p>
    <button onclick="logout()">Yes, Logout</button>
  </div>
</div>



<!-- Confirmation dialog -->
<div id="confirmationDialog" style="display: none;">
    <p>Are you sure you want to delete this note?</p>
    <button onclick="confirmDelete(<?php echo $note['note_id']; ?>)">Yes</button>
    <button onclick="hideConfirmation()">No</button>
</div>





<script src="script.js"></script>


</body>
</html>

