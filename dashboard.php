<?php
session_start();

// Check if the user is not logged in; if not, redirect to the login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to Your Dashboard</h1>
    <p>Hello, <?php echo $_SESSION['username']; ?>!</p>
    
    <p>Your personalized content goes here.</p>
    
    <form action="logout.php" method="post">
        <button type="submit" name="logout">Log Out</button>
    </form>
</body>
</html>
