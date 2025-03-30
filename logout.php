<?php
session_start();

// Destroy the session to log the user out
session_destroy();

// Redirect to login selection page
header('Location: login_selection.php');
exit();
?>
