<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fine_id = $_POST["fine_id"];
    $conn->query("UPDATE fines SET fine_status='Paid', paid_date=NOW() WHERE fine_id='$fine_id'");
    echo "Fine marked as paid!";
}

$result = $conn->query("SELECT * FROM fines INNER JOIN members ON fines.member_id = members.member_id");

echo "<table border='1'>";
echo "<tr><th>Member Name</th><th>Fine Amount</th><th>Status</th><th>Action</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['name']}</td><td>Rs. {$row['fine_amount']}</td><td>{$row['fine_status']}</td>";
    if ($row['fine_status'] == 'Unpaid') {
        echo "<td><form method='POST'><input type='hidden' name='fine_id' value='{$row['fine_id']}'><button type='submit'>Mark Paid</button></form></td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
