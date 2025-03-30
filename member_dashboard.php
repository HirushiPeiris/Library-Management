<?php
session_start();
<?php
session_start();

// Check if the user is logged in and has the 'member' role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'member') {
    header('Location: login_selection.php');  // Redirect to login selection if not logged in or not member
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome to the Member Dashboard</h2>
        <ul>
            <li><a href="view_books.php">View Books</a></li>
            <li><a href="borrow_book.php">Borrow Book</a></li>
            <li><a href="view_fines.php">View Fines</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
