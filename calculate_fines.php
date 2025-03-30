<?php
include 'db_connect.php';

$sql = "SELECT * FROM transactions WHERE status = 'Borrowed'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $transaction_id = $row['id'];
    $due_date = new DateTime($row['due_date']);
    $current_date = new DateTime();
    
    if ($current_date > $due_date) {
        $late_days = $due_date->diff($current_date)->days;
        $fine_amount = $late_days * 50; // Rs. 50 per day late fee
        
        $conn->query("INSERT INTO fines (member_id, transaction_id, fine_amount, fine_status) 
                      VALUES ('{$row['member_id']}', '$transaction_id', '$fine_amount', 'Unpaid')");
    }
}

echo "Fine Calculation Completed!";
?>
