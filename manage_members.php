<?php
include 'db_connect.php';

// Fetch all members
$result = $conn->query("SELECT * FROM members");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add"])) {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);
        $address = trim($_POST["address"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format.");
        }
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            die("Invalid phone number.");
        }

        $sql = "INSERT INTO members (name, email, phone_number, address) VALUES ('$name', '$email', '$phone', '$address')";
        $conn->query($sql);
        echo "Member added successfully!";
    }

    if (isset($_POST["delete"])) {
        $id = $_POST["member_id"];
        $conn->query("DELETE FROM members WHERE member_id='$id'");
        echo "Member deleted successfully!";
    }
}
?>
