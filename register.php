<?php
include('db_connection.php');  // Include your database connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Hash the password (recommended for security)
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert data into members table
    $sql = "INSERT INTO members (name, email, phone_number, password) VALUES ('$name', '$email', '$phone_number', '$hashed_password')";
    
    if (mysqli_query($conn, $sql)) {
        // Registration successful, redirect to Member Dashboard or Login page
        header('Location: login.html');  // You can redirect to login page or member dashboard
    } else {
        // Handle errors (if any)
        echo "Error: " . mysqli_error($conn);  // This will show any error related to the query execution
    }
}
?>
