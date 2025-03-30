<?php
session_start();

// Check if the user is logged in and has the 'staff' role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'staff') {
    header('Location: login_selection.php');  // Redirect to login selection if not logged in or not staff
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome to the Staff Dashboard</h2>
        <ul>
            <li><a href="manage_books.php">Manage Books</a></li>
            <li><a href="manage_members.php">Manage Members</a></li>
            <li><a href="manage_transactions.php">Manage Transactions</a></li>
            <li><a href="manage_fines.php">Manage Fines</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
