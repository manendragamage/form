<?php
session_start();

// Check if the user is already logged in; if yes, redirect to the dashboard
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

// Check if the login form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // You should perform validation and sanitization of input here

    // For this example, we'll retrieve the user data from the session
    // In a real-world scenario, you'd validate against data stored in a database
    if (isset($_SESSION['user']) && $_SESSION['user']['username'] === $username && password_verify($password, $_SESSION['user']['password'])) {
        // Login successful; set the username in the session
        $_SESSION['username'] = $username;

        // Redirect to the dashboard after successful login
        header('Location: dashboard.php');
        exit;
    } else {
        // Login failed; display an error message
        $loginError = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit" name="submit">Log In</button>
    </form>
    
    <?php if (isset($loginError)) : ?>
        <p><?php echo $loginError; ?></p>
    <?php endif; ?>
</body>
</html>
