<?php
session_start();

// Check if the signup form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve user input from the form
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $user = [
        'email' => $email,
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT), 
    ];

    
    $_SESSION['user'] = $user;

    // Redirect to the dashboard after successful signup
    header('Location: login.html');
    exit;
}
?>

