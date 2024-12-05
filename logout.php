<?php
// Logout code
session_start(); // Start the session to access session variables

// Destroy all session data
$_SESSION = []; // Clear session variables
session_unset(); // Unset session
session_destroy(); // Destroy the session

// Optionally, clear session cookies (if any)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redirect to the login page or homepage
header("Location: index.php");
exit(); // Ensure no further code is executed
