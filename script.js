function confirmDelete() {
    var result = confirm("Are you sure you want to delete this note?");
    if (result) {
        // If user clicks "Yes", submit the form
        document.getElementById("deleteForm").submit();
    } else {
        // If user clicks "No", redirect to the notes dashboard or any other page
        window.location.href = "dashboard.php";
    }
}

function validateForm(form) {
var title = form.title.value.trim();
var content = form.content.value.trim();

if (title === '' || content === '') {
alert('Please fill in all fields.');
return false;
}

return true;
 }

function validateEditForm(form) {
var title = form.title.value.trim();
var content = form.content.value.trim();

if (title === '' || content === '') {
alert('Please fill in all fields.');
return false;
}

return true;
 }


function openPopup(popupId) {
document.getElementById(popupId).style.display = "block";
 }

 function closePopup(popupId) {
document.getElementById(popupId).style.display = "none";
 }
function confirmLogout() {
if (confirm("Are you sure you want to log out?")) {
// If user confirms, redirect to logout script
window.location.href = "logout.php";
} else {
// If user cancels, do nothing
return false;
}
 }

function archiveNote(noteId) {
if (confirm("Are you sure you want to archive this note?")) {
// If user confirms, call archive_notes.php with the note ID
window.location.href = "archive_notes.php?id=" + note_id;
}
 }

// Add this JavaScript code at the end of your HTML body or in a separate script file
function showLogoutPopup() {
document.getElementById("logoutPopup").style.display = "block";
 }

function closeLogoutPopup() {
document.getElementById("logoutPopup").style.display = "none";
 }

 function logout() {
// Redirect to logout page or perform logout actions here
// For example, you can redirect to logout.php
window.location.href = "logout.php";
 }

function archiveNote(noteId) {
if (confirm("Are you sure you want to archive this note?")) {
window.location.href = "archive.php?id=" + noteId;
}
}

function showConfirmation(noteId) {
    // Display a confirmation dialog
    var confirmation = confirm("Are you sure you want to delete this note?");
    
    // If user confirms, redirect to delete_note.php with the note ID
    if (confirmation) {
        window.location.href = "delete_notes.php?id=" + noteId;
    }
}


function confirmRecovery(note_id) {
    var confirmRecovery = confirm("Are you sure you want to recover this note?");
    if (confirmRecovery) {
        // If user confirms, redirect to the PHP script with note_id
        window.location.href = "recover_note.php?note_id=" + note_id;
    } else {
        // If user cancels, do nothing
        return false;
    }
}

function confirmUnarchive(note_id) {
    var confirmRecovery = confirm("Are you sure you want to Unarchive this note?");
    if (confirmRecovery) {
        // If user confirms, redirect to the PHP script with note_id
        window.location.href = "unarchive.php?note_id=" + note_id;
    } else {
        // If user cancels, do nothing
        return false;
    }
}

function favoriteNote(noteId) {
    if (confirm("Are you sure you want to add this note to favorites?")) {
        window.location.href = "favorite_notes.php?id=" + noteId;
    }
}


function confirmUnfavorite(note_id) {
    var confirmRecovery = confirm("Are you sure you want to Unarchive this note?");
    if (confirmRecovery) {
        // If user confirms, redirect to the PHP script with note_id
        window.location.href = "unfavorite.php?note_id=" + note_id;
    } else {
        // If user cancels, do nothing
        return false;
    }
}

  // Get the search box element
  const searchBox = document.getElementById('searchBox');

  // Add event listener for input event
  searchBox.addEventListener('input', function() {
      // Submit the form when the input changes
      document.getElementById('searchForm').submit();
  });

  document.addEventListener("DOMContentLoaded", function() {
    var searchBox = document.getElementById("searchBox");

    searchBox.addEventListener("input", function() {
        var searchTerm = this.value.trim().toLowerCase();
        var notes = document.querySelectorAll(".note");

        notes.forEach(function(note) {
            var title = note.querySelector("h2").textContent.trim().toLowerCase();
            var content = note.querySelector("p").textContent.trim().toLowerCase();
            if (title.includes(searchTerm) || content.includes(searchTerm)) {
                note.style.display = "block";
            } else {
                note.style.display = "none";
            }
        });
    });
});