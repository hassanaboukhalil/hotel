<?php
session_start(); // Start or resume the session

// Unset all of the session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to a login page or any other desired location
header("Location: signin.php"); // Replace "login.php" with the desired destination
exit;
?>