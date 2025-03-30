<?php
session_start();
include('db_connection.php');  // Include your database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = $_POST['role'];  // Get role from POST request

    // Query to check if user exists and match the role
    $sql = "SELECT * FROM members WHERE email = '$email' AND role = '$role'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['member_id'];
            $_SESSION['role'] = $user['role'];  // Store user role in session

            // Redirect to the appropriate dashboard based on role
            if ($role == 'staff') {
                header('Location: staff_dashboard.php');
            } else {
                header('Location: member_dashboard.php');
            }
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>

