<?php
session_start();

// Check if the user is logged in; if yes, log them out
if (isset($_SESSION['username'])) {
    // Destroy the session to log the user out
    session_destroy();
}

// Redirect to the login page after logging out
header('Location: login.php');
exit;
?>
