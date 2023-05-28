<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: PHPLogin.php");
    exit();
}
?>