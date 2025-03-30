<?php
include 'db_connect.php';
session_start();

$member_id = $_SESSION["user_id"];

$result = $conn->query("SELECT * FROM fines WHERE member_id='$member_id'");

echo "<table border='1'>";
echo "<tr><th>Fine Amount</th><th>Status</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>Rs. {$row['fine_amount']}</td><td>{$row['fine_status']}</td></tr>";
}
echo "</table>";
?>
