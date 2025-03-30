<?php
include 'db_connect.php';

// Fetch all staff
$result = $conn->query("SELECT * FROM staff");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);
        $role = $_POST["role"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format.");
        }
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            die("Invalid phone number.");
        }

        $sql = "INSERT INTO staff (name, email, phone_number, role) VALUES ('$name', '$email', '$phone', '$role')";
        $conn->query($sql);
        echo "Staff added successfully!";
    }

    if (isset($_POST["delete"])) {
        $id = $_POST["staff_id"];
        $conn->query("DELETE FROM staff WHERE staff_id='$id'");
        echo "Staff deleted successfully!";
    }
}
?>
