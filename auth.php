<?php
// Repository: php-auth-system
// Description: A basic user authentication system with sessions.

session_start();

$users = [
    "admin" => password_hash("password123", PASSWORD_BCRYPT)
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['username'] = $username;
        echo "Login successful.";
    } else {
        echo "Invalid username or password.";
    }
}

if (isset($_SESSION['username'])) {
    echo "Welcome, {$_SESSION['username']}!";
    echo '<br><a href="?logout">Logout</a>';
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: auth.php");
    exit;
}
?>
<!-- HTML Form -->
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
